<?php 
	$restaurant = mysql_real_escape_string($_POST['search']);
	$connection = mysql_connect('127.0.0.1','root','');
	mysql_select_db('thrifty_drink', $connection);
	$result = mysql_query("SELECT * FROM price_submissions ps JOIN restaurants r on ps.restaurant_id = r.restaurant_id JOIN drinks d ON ps.drink_id = d.drink_id WHERE r.name = '$restaurant';", $connection);
	//$rows = mysql_fetch_array($result);  //false if not in database //true if in db
	
	//adds all the prices into a two dimensional array $drinkPriceArray['drink_id][list of drink prices]
	$drinkPriceArray = array();
	while($row = mysql_fetch_array($result))
	{
		$drink_id = $row['name'];
		$price = $row['price'];
		if(isset($drinkPriceArray[$drink_id])) {
			$nextIndex = count($drinkPriceArray[$drink_id]);
			$drinkPriceArray[$drink_id][$nextIndex] = $price;
		} else {
			$drinkPriceArray[$drink_id][0] = $price;
		}
	}
	$drinkAveragePrice = array();
	foreach ($drinkPriceArray as $drink_id => $drink_prices)
	{
		$sumPrice = 0;
		$counter = 0;
		foreach($drink_prices as $drink_price)
		{
			$sumPrice += $drink_price;
			$counter++;
		}
		$averagePrice = $sumPrice / $counter;
		$drinkAveragePrice[$drink_id] = $averagePrice;
	}
	
	
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Thrifty Drinks Alpha</title>
		<meta name="description" content="">
		<meta name="author" content="Kyle">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<div id="container">
			<header>
				<h1><a href="index.html">Thrifty Drinks Alpha</a></h1>
			</header>
			<h2>Search Results</h2>
			<strong><?= $_POST['search']; ?> has <?= count($drinkAveragePrice); ?> drinks on record</strong>
			<?php
				foreach($drinkAveragePrice as $key => $value) {
					echo "<p>" . $key . " average price is " . $value . "</p>";
				}
			?>
		</div>
	</body>
</html>
