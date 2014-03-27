<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

		<title>Thrifty Drink</title>

		<!-- Bootstrap core CSS -->
		<link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../public/bootstrap/css/style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Thrifty Drink</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">Sign In</a>
						</li>
						<li>
							<a href="#">Register</a>
						</li>
					</ul>
					<!--<form class="navbar-form navbar-right" role="form">
					<div class="form-group">
					<input type="text" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
					<input type="password" placeholder="Password" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">
					Sign in
					</button>
					</form> -->
				</div><!--/.navbar-collapse -->
			</div>
		</div>

		<div class="jumbotron">
			<div class="container">
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
			</div>
		</div>
		<div class="container">
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
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="../../dist/js/bootstrap.min.js"></script>

	</body>
</html>
