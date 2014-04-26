<?php
class AddData extends Seeder {

	public function run() {

		$user = new User;
		$user -> id = 'GUEST';
		$user -> password = Hash::make('GUEST');
		$user -> email = 'guest@guest.com';
		$user -> save();

		$drink = new Drink;
		$drink -> id = 'Blue Moon';
		$drink -> type = 'Beer';
		$drink -> save();

		$restaurant = new Restaurant;
		$restaurant -> id = 'Taco Mac';
		$restaurant -> save();

		$price_submission = new PriceSubmission;
		$price_submission -> restaurant_id = 'Taco Mac';
		$price_submission -> drink_id = 'Blue Moon';
		$price_submission -> zip = '30043';
		$price_submission -> user_id = 'GUEST';
		$price_submission -> price = '5.00';
		$price_submission -> save();
	}

}
