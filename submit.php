<?php
	$restaurant = $_POST['restaurant'];
	$zip = $_POST['zip'];
	$drink = $_POST['drink'];
	$price = $_POST['price'];
	$drink_type = $_POST['drink_type'];
	
	
	
	// NEED LIBRARY TO CHECK FOR SIMILAR NAMES LIKE GOOGLE DID YOU MEAN
	$restaurantResult = searchDatabase($restaurant, 'restaurants', 'name', 'restaurant_id');
	$drinkResult = searchDatabase($drink, 'drinks', 'name', 'drink_id');
		
	// Searches for matches in the database
	function searchDatabase($searchTerm, $table, $searchColName, $pkColName) {
		$connection = mysql_connect('127.0.0.1','root','');
		mysql_select_db('thrifty_drink', $connection);
		$result = mysql_query("SELECT $searchColName, $pkColName FROM $table;", $connection);
		$rows = mysql_fetch_array($result);  //false if not in database //true if in db
		//MAGIC CODE TO MAKE WORK
		//MAYBE USE LIKE IN SQL QUERY
		$closestPK = '';
		$closestName = '';
		$return = array('closestPK' => $closestPK, 'closestName' => $closestName);
		return $return;
	}
	
	submit($restaurant, $drink, $drink_type, $price, $zip, 4, 4, 'GUEST');
	
	function submit($restaurant, $drink, $drink_type, $price, $zip, $drink_id, $restaurant_id, $username) {
		$connection = mysql_connect('127.0.0.1','root','');
		mysql_select_db('thrifty_drink', $connection);
		mysql_query("INSERT INTO restaurants VALUES ('','$restaurant','');", $connection);
		mysql_query("INSERT INTO drinks VALUES ('','$drink','$drink_type');", $connection);
		mysql_query("INSERT INTO price_submissions VALUES ('', '$drink_id', '$restaurant_id', '$username', $price, $zip);", $connection);
		
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Thrifty Drinks Prototype</title>
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
				<h1>Thrifty Drinks Prototype</h1>
			</header>
			<p>You are submitting <strong><?= $restaurant . " " . $zip  . " $" . $price  . " " . $drink  . " " . $drink_type ?></strong></p>
		</div>
	</body>
</html>
