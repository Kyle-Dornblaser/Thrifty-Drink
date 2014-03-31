<?php

class DatabaseController extends BaseController {

	public function saveSubmission() {
		$restaurantName = $_POST['restaurant'];
		$zip = $_POST['zip'];
		$drinkName = $_POST['drink'];
		$price = $_POST['price'];
		$drinkType = $_POST['drink_type'];

		$drink = Drink::find($drinkName);
		if ($drink == null) {
			$drink = new Drink;
			$drink -> id = $drinkName;
			$drink -> type = $drinkType;
			$drink -> save();
		}

		$restaurant = Restaurant::find($restaurantName);
		if ($restaurant == null) {
			$restaurant = new Restaurant;
			$restaurant -> id = $restaurantName;
			$restaurant -> save();
		}

		$price_submission = new PriceSubmission;
		$price_submission -> restaurant_id = $restaurantName;
		$price_submission -> drink_id = $drinkName;
		$price_submission -> zip = $zip;
		$price_submission -> user_id = 'GUEST';
		$price_submission -> price = $price;
		$price_submission -> save();
		
		return View::make('thanks');
	}

	public function createDatabase() {
		Schema::create('users', function($table) {
			$table -> engine = 'InnoDB';

			$table -> string('id', 25) -> primary();
			$table -> string('password', 60);
			$table -> string('email', 30);
			$table -> timestamps();
		});

		Schema::create('restaurants', function($table) {
			$table -> engine = 'InnoDB';

			$table -> string('id', 30) -> primary();
			$table -> string('type', 30) -> nullable();
			$table -> timestamps();
		});

		Schema::create('drinks', function($table) {
			$table -> engine = 'InnoDB';

			$table -> string('id', 30) -> primary();
			$table -> string('type', 30);
			$table -> timestamps();
		});

		Schema::create('price_submissions', function($table) {
			$table -> engine = 'InnoDB';

			$table -> increments('id') -> primary();
			$table -> string('drink_id', 30);
			$table -> string('restaurant_id', 30);
			$table -> string('user_id', 25);
			$table -> integer('zip');
			$table -> double('price');
			$table -> timestamps();

			$table -> foreign('drink_id') -> references('id') -> on('drinks');
			$table -> foreign('restaurant_id') -> references('id') -> on('restaurants');
			$table -> foreign('user_id') -> references('id') -> on('users');
		});

	}

}
?>