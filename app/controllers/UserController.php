<?php

class UserController extends BaseController {
	public function signIn() {
		$user = array('id' => Input::get('username'), 'password' => Input::get('password'));
		Auth::attempt($user);

		return Redirect::to('/');
	}

	public function register() {
		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');
		$repeat_password = Input::get('repeat-password');

		if (strcmp($password, $repeat_password) == 0) {
			if (!User::find($username)) {
				$user = new User;
				$user -> id = $username;
				$user -> email = $email;
				$user -> password = Hash::make($password);
				$user -> save();

				$user = User::where('id', '=', $username) -> first();
				Auth::login($user);
			}

		}

		return Redirect::to('/');

	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/') -> with(array('flash_notice' => 'You have successfully logged out.', 'class' => 'alert-success'));
	}
}
?>