<?php

class RestaurantController extends BaseController {

	public function showRestaurant($name) {
		$submissions = array();
		$submissions['Beer'] = 		PriceSubmission::join('drinks', 'drinks.id', '=', 'price_submissions.drink_id')->
									where('restaurant_id', $name) ->
									where('type', 'beer') ->
									select('drink_id', 'price') -> 
									get();
		$submissions['Wine'] =		PriceSubmission::join('drinks', 'drinks.id', '=', 'price_submissions.drink_id')->
									where('restaurant_id', $name) ->
									where('type', 'wine') ->
									select('drink_id', 'price') -> 
									get();
		$submissions['Cocktail'] =	PriceSubmission::join('drinks', 'drinks.id', '=', 'price_submissions.drink_id')->
									where('restaurant_id', $name) ->
									where('type', 'cocktail') ->
									select('drink_id', 'price') -> 
									get();
		$submissions['Other'] =		PriceSubmission::join('drinks', 'drinks.id', '=', 'price_submissions.drink_id')->
									where('restaurant_id', $name) ->
									where('type', 'other') ->
									select('drink_id', 'price') -> 
									get();
		
		//average Prices for each drink
		$submissions['Beer'] = $this->getAverageDrinkPrices($submissions['Beer']);
		$submissions['Wine'] = $this->getAverageDrinkPrices($submissions['Wine']);
		$submissions['Cocktail'] = $this->getAverageDrinkPrices($submissions['Cocktail']);
		$submissions['Other'] = $this->getAverageDrinkPrices($submissions['Other']);
		
		//$averagedSubmissions = $this->getAverageDrinkPrices($submissions);
		
		//sorts the arrays based off Key which is drink_id
		ksort($submissions['Beer']);
		ksort($submissions['Wine']); 
		ksort($submissions['Cocktail']); 
		ksort($submissions['Other']); 
		
		return View::make('restaurant', array('name' => $name, 'submissions' => $submissions));
	}

	public function showAllRestaurants() {
		$restaurants = DB::table('restaurants') -> get();
		return View::make('allRestaurants', array('restaurants' => $restaurants));
	}

	public function getAverageDrinkPrices($_submissions) {
		//adds all the prices into a two dimensional array $drinkPriceArray['drink_id][list of drink prices]
		$drinkPriceArray = array();
		foreach ($_submissions as $_submission) {
			$drink_id = $_submission -> drink_id;
			$price = $_submission -> price;
			if (isset($drinkPriceArray[$drink_id])) {
				$nextIndex = count($drinkPriceArray[$drink_id]);
				$drinkPriceArray[$drink_id][$nextIndex] = $price;
			} else {
				$drinkPriceArray[$drink_id][0] = $price;
			}
		}
		//averages the drinks in an array $drinkAveragePrice['drink_id']['average_price']
		$drinkAveragePrice = array();
		foreach ($drinkPriceArray as $drink_id => $drink_prices) {
			$sumPrice = 0;
			$counter = 0;
			foreach ($drink_prices as $drink_price) {
				$sumPrice += $drink_price;
				$counter++;
			}
			$averagePrice = $sumPrice / $counter;
			$drinkAveragePrice[$drink_id] = array ('averagePrice' => $averagePrice, 'count' => $counter);
		}
		return $drinkAveragePrice;
	}
	
	public function search() {
		$name = Input::get('search');
		return Redirect::to("/restaurant/$name");
	}

}
?>