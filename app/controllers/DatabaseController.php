<?php
class DatabaseController extends BaseController {
	public function saveSubmission() {
		//return var_dump($_POST);
		
		$captcha = new Captcha\Captcha();
		$captcha->setPublicKey('6LeKgPISAAAAAO0SpYBQjP1CbmFzlaXlQkchCk4Q');
		$captcha->setPrivateKey('6LeKgPISAAAAABpNplKKs2or27pmtE-QU0OAu2dV');
		
		$recaptcha_challenge = Input::get('recaptcha_challenge_field');
		$recaptcha_response = Input::get('recaptcha_response_field');
		
		$response = $captcha -> check($recaptcha_challenge, $recaptcha_response);
		if ($response -> isValid() || Auth::check()) {
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

			if (Auth::check()) {
				$username = Auth::user() -> id;
			} else {
				$username = 'GUEST';
			}

			$price_submission = new PriceSubmission;
			$price_submission -> restaurant_id = $restaurantName;
			$price_submission -> drink_id = $drinkName;
			$price_submission -> zip = $zip;
			$price_submission -> user_id = $username;
			$price_submission -> price = $price;
			$price_submission -> save();

			return View::make('thanks', array('restaurant' => $restaurantName));
		} else {
			//return var_dump($captcha->check($recaptcha_challenge, $recaptcha_response));
			return Redirect::to('/') -> with(array('flash_notice' => 'You entered an incorrect reCAPTCHA. Please try again.', 'class' => 'alert-danger')) -> withInput();
		}
	}

	public function recaptcha() {
		$publickey = "6LeKgPISAAAAAO0SpYBQjP1CbmFzlaXlQkchCk4Q";
		$privatekey = "6LeKgPISAAAAABpNplKKs2or27pmtE-QU0OAu2dV";
		$valid = false;

		# the response from reCAPTCHA
		$resp = null;
		# the error code from reCAPTCHA, if any
		$error = null;

		if ($_POST["recaptcha_response_field"]) {
			$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

			if ($resp -> is_valid) {
				$valid = true;
			} else {
				# set the error code so that we can display it
				$error = $resp -> error;
				$valid = false;
			}
		}
		return $valid;
	}

}
?>