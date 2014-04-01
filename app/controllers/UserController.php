<?php

class UserController extends BaseController {
	public function logon() {
		$user = array('id' => Input::get('username'), 'password' => Input::get('password'));
		Auth::attempt($user);
		
		
		return var_dump(Auth::check());
		
	}

}
?>