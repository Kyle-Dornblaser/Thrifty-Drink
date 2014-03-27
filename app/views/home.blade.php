@extends('master')

@section('jumbotron')

<div class="col-sm-6">
	<h1>Get the price before you order</h1>

	<p>
		Find drink prices from your favorite bars and restaurants
	</p>
	<div style="padding-left:15px; padding-right: 15px; width: 100%;">
		<form class="form-horizontal">
			<fieldset>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" id="search" placeholder="Enter restaurant or bar here">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								Search
							</button> </span>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<div class="col-sm-6">
	<h2>Recent Submissions</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Restaurant</th>
				<th>Drink</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Taco Mac</td>
				<td>Bud Lite</td>
				<td>$3.00</td>
			</tr>
			<tr>
				<td>Chili's</td>
				<td>Blue Moon</td>
				<td>$500</td>
			</tr>
			<tr>
				<td>Taco Mac</td>
				<td>Bud Lite</td>
				<td>$3.00</td>
			</tr>
			<tr>
				<td>Chili's</td>
				<td>Blue Moon</td>
				<td>$500</td>
			</tr>
		</tbody>
	</table>
</div>

@stop

@section('main-content')

<div class="col-sm-6 well" id="submit-description">
	<h1>Spread the knowledge</h1>
	<p>
		Submit drinks that you have bought so others can benefit from it
	</p>
</div>
<div class="col-sm-6">
	<div class="form-group">
		<label class="control-label" for="restaurantName">Restaurant Name</label>
		<input class="form-control" id="restaurantName" type="text" placeholder="Restaurant Name">
	</div>
	<div class="form-group">
		<label class="control-label" for="zipCode">Zip Code</label>
		<input class="form-control" id="zipCode" type="text" placeholder="Zip Code">
	</div>
	<div class="form-group">
		<label class="control-label" for="drinkName">Drink Name</label>
		<input class="form-control" id="drinkName" type="text" placeholder="Drink Name">
	</div>
	<div class="form-group">
		<label class="control-label" for="drinkPrice">Drink Price</label>
		<div class="input-group">
			<span class="input-group-addon">$</span>
			<input type="text" class="form-control" id="drinkPrice">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label" for="drinkType">Drink Type</label>
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
		<div class="form-group">

			<button class="btn btn-default">
				Cancel
			</button>
			<button type="submit" class="btn btn-primary">
				Submit
			</button>

		</div>
	</div>
</div>
@stop
