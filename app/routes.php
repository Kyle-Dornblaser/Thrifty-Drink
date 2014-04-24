<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register all of the routes for an application.
 | It's a breeze. Simply tell Laravel the URIs it should respond to
 | and give it the Closure to execute when that URI is requested.
 |
 */

Route::model('restaurant', 'Restaurant');
Route::model('priceSubmission', 'PriceSubmission');

Route::get('/', array('as' => 'home', function() {

	return View::make('home');
}));


Route::group(array('before' => 'guest'), function() {

	Route::get('/register', array('as' => 'register', function() {
		return View::make('register');
	}));

	Route::post('/register', 'UserController@register');

	Route::get('/signin', array('as' => 'signin', function() {
		return View::make('signin');
	}));

	Route::post('/signin', 'UserController@signIn');

});

Route::group(array('before' => 'auth'), function() {
	Route::get('/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

	Route::get('/mysubmissions', array('as' => 'mysubmissions', 'uses' => 'DrinkSubmissionController@showSubmissions'));
	Route::post('/mysubmissions/delete/{priceSubmission}', 'DrinkSubmissionController@deleteSubmission');
	Route::get('/mysubmissions/edit/{priceSubmission}', array('as' => 'editSubmission', 'uses' => 'DrinkSubmissionController@showEditSubmission'));
	Route::post('/mysubmissions/edit/{priceSubmission}', array('as' => 'editSubmission', 'uses' => 'DrinkSubmissionController@editSubmission'));

});

Route::get('/restaurants/', array('as' => 'restaurants', 'uses' => 'RestaurantController@showAllRestaurants'));

Route::get('/restaurant/{restaurant}', 'RestaurantController@showRestaurant');

Route::post('/submit', 'DatabaseController@saveSubmission');

Route::post('/search', 'RestaurantController@search');
