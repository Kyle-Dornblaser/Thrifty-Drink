<?php 
	$restaurant = mysql_real_escape_string($_GET['search']);
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

<?php include 'header.php'; ?>
			<h2>Search Results</h2>
			<strong><?= $_GET['search']; ?> has <?= count($drinkAveragePrice); ?> drinks on record</strong>
			<?php
				foreach($drinkAveragePrice as $key => $value) {
					echo "<p><em>" . $key . "</em> average price is <em>$" . $value . "</em></p>";
				}
			?>
<?php include 'footer.php'; ?>