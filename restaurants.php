<?php include 'header.php'; ?>
<?php
	$connection = mysql_connect('127.0.0.1','root','');
	mysql_select_db('thrifty_drink', $connection);
	$result = mysql_query("SELECT * FROM restaurants;", $connection);
	
	$restaurants = array();
	$counter = 0;
	while($row = mysql_fetch_array($result)) {
		$restaurants[$counter++] = $row['name'];
	}
	sort($restaurants);
	foreach($restaurants as $restaurant) {
		echo '<p><a href="search.php?search=' . $restaurant . '">'. $restaurant . '</a></p>';
	}

?>
<?php include 'footer.php'; ?>
