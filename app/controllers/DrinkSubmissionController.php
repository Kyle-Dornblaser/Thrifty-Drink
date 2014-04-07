<?php

class DrinkSubmissionController extends BaseController {
	public function showSubmissions() {
		if (Auth::check()) {
			$username = Auth::user() -> id;
			$submissions = PriceSubmission::where('user_id', $username) -> select('drink_id', 'restaurant_id', 'price', 'id') -> get();
			return View::make('mysubmissions', array('submissions' => $submissions));
		} else {
			return Redirect::to('/');
		}
	}

	public function deleteSubmission() {
		if (Auth::check()) {
			$username = Auth::user() -> id;
			$priceSubmissionId = Input::get('id');
			$priceSubmission = PriceSubmission::find($priceSubmissionId);
			if ($priceSubmission -> user_id == $username) {
				$priceSubmission -> delete();
			}
		}
		return Redirect::to('/mysubmissions');
	}

}
?>