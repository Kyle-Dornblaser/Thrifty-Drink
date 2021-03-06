@extends('master')

@section('jumbotron')

<div class="col-sm-8">
	<div class="animated fadeInLeft">
		<h1>Get the price before you order</h1>
		<p>
			Find drink prices from your favorite bars and restaurants
		</p>
		<div class="btn btn-lg btn-info" id="searchButton" role="button" style="margin: 0 10px 10px 0">
			Search
		</div>
		<a class="btn btn-lg btn-default" href="/restaurants" role="button" style="margin: 0 10px 10px 0;">Browse All Restaurants</a>
		<div id="searchForm" style="display:none;margin: 10px 0 0 0;">
			{{ Form::open(array('action' => 'RestaurantController@search')) }}
			<fieldset>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" id="search" name="search" placeholder="Enter restaurant or bar here" required="">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								Search
							</button> </span>
					</div>
				</div>
			</fieldset>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop

@section('main-content')

<div class="col-sm-6" id="submit-description">
	<h1>Submit your price</h1>
	<p>
		Submit drinks that you have bought so others can benefit from it
	</p>
</div>
<div class="col-sm-6">
	{{ Form::open(array(
	'action'       => 'DatabaseController@saveSubmission',
	'id' => 'submitDrink'
	)) }}
	<div class="form-group">
		<label class="control-label" for="restaurantName">Restaurant Name</label>
		<input class="form-control" id="restaurantName" name="restaurant" type="text" placeholder="Restaurant Name" required="">
	</div>
	<div class="form-group">
		<label class="control-label" for="zipCode">Zip Code</label>
		<input class="form-control" id="zipCode" name="zip" type="text" placeholder="Zip Code" required="">
	</div>
	<div class="form-group">
		<label class="control-label" for="drinkName">Drink Name</label>
		<input class="form-control" id="drinkName" name="drink" type="text" placeholder="Drink Name" required="">
	</div>
	<div class="form-group">
		<label class="control-label" for="drinkPrice">Drink Price</label>
		<div class="input-group">
			<span class="input-group-addon">$</span>
			<input type="text" class="form-control" name="price" id="drinkPrice" required="">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">Drink Type</label>
		<div class="radio">
			<label>
				<input type="radio" name="drink_type" value="beer" checked="checked">
				Beer</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="drink_type" value="wine">
				Wine</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="drink_type" value="cocktail">
				Cocktail</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="drink_type" value="other">
				Other</label>
		</div>
	</div>
	@if(Auth::guest())
	<div class="form-group">
		<label class="control-label">Prove you human or at least a clever computer</label>
		<p>Logged in users don't see CAPTCHA. {{ HTML::linkRoute('signin', 'Login') }} or {{ HTML::linkRoute('register', 'register') }} now.</p>
		<div id="recaptcha" style="margin-top: 20px;"></div>
	</div>
	@endif
	<div class="form-group">

		<button type="reset" class="btn btn-default">
			Clear
		</button>
		<button type="submit" class="btn btn-primary">
			Submit
		</button>

	</div>
	{{ Form::close() }}
</div>
@stop

@section('scripts')
<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<script>

 Recaptcha.create("6LeKgPISAAAAAO0SpYBQjP1CbmFzlaXlQkchCk4Q",
    "recaptcha",
    {
      theme: "clean",
    }
  );

	$(document).ready(function() {
		//$('#zipCode').focus(function() {
		$('#submitDrink :input').focus(function() {
			if ($('#zipCode').val() == '') {
				getLocation();
			}
		});
	});

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) {

		$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ', ' + position.coords.longitude + '&sensor=true&result_type=postal_code&key=AIzaSyAGA5gNtINOy6Zx_JEkjBls3OPsj8P0gc8', function(result) {
			var zip = result.results[0]['address_components'][0]['short_name'];
			var patt = /\b\d{5}\b/;
			
			console.log(zip);
			if (patt.test(zip)) {
				$('#zipCode').val(zip);
			}
			
		});
	}
</script>
@stop
