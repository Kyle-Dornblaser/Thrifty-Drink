<?php

class RestaurantController extends BaseController {

	public function showRestaurant($name) {
		
		$submissions = DB::table('price_submissions')->where('restaurant_id', $name)->select('drink_id','price')->get();
		
		return View::make('restaurant', array('name' => $name, 'submissions' => $submissions));
	}

	public function showAllRestaurants() {
		$restaurants = DB::table('restaurants') -> get();
		return View::make('allRestaurants', array('restaurants' => $restaurants));
	}

}
?>