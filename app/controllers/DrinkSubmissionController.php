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

	public function deleteSubmission(PriceSubmission $priceSubmission) {
		if (Auth::check()) {
			$username = Auth::user() -> id;
			if ($priceSubmission -> user_id == $username) {
				$priceSubmission -> delete();
			}
		}
		return Redirect::to('/mysubmissions');
	}
	
	public function showEditSubmission(PriceSubmission $priceSubmission) {
		return View::make('editsubmission', array('priceSubmission' => $priceSubmission));
	}
	
	public function editSubmission(PriceSubmission $priceSubmission) {
		$price = Input::get('price');	
		$priceSubmission -> price = $price;
		$priceSubmission -> save();
		return Redirect::to('/mysubmissions');
	}

}
?>