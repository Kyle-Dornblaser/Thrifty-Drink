<?php

class RestaurantController extends BaseController {

	public function saveSubmission($name)
	{
		return View::make('restaurant', array('name' => $name));
	}

}

?>