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

Route::get('/', function() {

	return View::make('home');
});

Route::get('/register', function() {
	return View::make('register');
});

Route::get('/restaurants/', 'RestaurantController@showAllRestaurants');

Route::get('/restaurant/{name}', 'RestaurantController@showRestaurant');

Route::get('/createdb', 'DatabaseController@createDatabase');

Route::post('/submit', 'DatabaseController@saveSubmission');

Route::get('/test', function() {

});
