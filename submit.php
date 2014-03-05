<?php
$restaurant = mysql_real_escape_string($_POST['restaurant']);
$zip = mysql_real_escape_string($_POST['zip']);
$drink = mysql_real_escape_string($_POST['drink']);
$price = mysql_real_escape_string($_POST['price']);
$drink_type = mysql_real_escape_string($_POST['drink_type']);

// NEED LIBRARY TO CHECK FOR SIMILAR NAMES LIKE GOOGLE DID YOU MEAN
$restaurantPK = searchDatabase($restaurant, 'restaurants', 'name', 'restaurant_id');
$drinkPK = searchDatabase($drink, 'drinks', 'name', 'drink_id');

if ($restaurantPK == false) {
	$rowArray = array('restaurant_id' => '', 'name' => $restaurant, 'type' => '');
	$restaurantPK = addToDatabase('restaurants', $rowArray, 'name', $restaurant);
}

if ($drinkPK == false) {
	$rowArray = array('drink_id' => '', 'name' => $drink, 'type' => $drink_type);
	$drinkPK = addToDatabase('drinks', $rowArray, 'name', $drink);
}

function searchDatabase($searchTerm, $table, $searchColName, $pkColName) {
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('thrifty_drink', $connection);

	//false if not in database //true if in db
	$result = mysql_query("SELECT * FROM $table WHERE $searchColName = '$searchTerm';", $connection);
	if ($result) {
		$rows = mysql_fetch_array($result);
		return $rows[$pkColName];
	} else {
		return false;
	}
}

//$array is key value pair with column name as key and value as value primary key is first index
function addToDatabase($table, $array, $searchColName, $searchTerm) {
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('thrifty_drink', $connection);
	$query = "INSERT INTO $table VALUES (";
	foreach ($array as $key => $value) {
		$query .= "'" . $value . "',";
	}
	$query = substr($query, 0, strlen($query) - 1);
	$query .= ");";
	$result = mysql_query($query, $connection);
	if ($result) {
		$keyArray = array_keys($array);
		$primaryKey = $keyArray[0];
		$result = mysql_query("SELECT * FROM $table WHERE $searchColName = '$searchTerm';", $connection);

		$rows = mysql_fetch_array($result);

		return $rows[$primaryKey];
	}
}

// Searches for matches in the database
function searchDatabaseSimilar($searchTerm, $table, $searchColName, $pkColName) {
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('thrifty_drink', $connection);
	$result = mysql_query("SELECT $searchColName, $pkColName FROM $table;", $connection);
	$rows = mysql_fetch_array($result);
	//false if not in database //true if in db
	//MAGIC CODE TO MAKE WORK
	//MAYBE USE LIKE IN SQL QUERY
	$closestPK = '';
	$closestName = '';
	$return = array('closestPK' => $closestPK, 'closestName' => $closestName);
	return $return;
}

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$username = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : 'GUEST';


submit($restaurant, $drink, $drink_type, $price, $zip, $drinkPK, $restaurantPK, $username);

function submit($restaurant, $drink, $drink_type, $price, $zip, $drink_id, $restaurant_id, $username) {
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('thrifty_drink', $connection);
	//mysql_query("INSERT INTO restaurants VALUES ('','$restaurant','');", $connection);
	//mysql_query("INSERT INTO drinks VALUES ('','$drink','$drink_type');", $connection);
	mysql_query("INSERT INTO price_submissions VALUES ('', '$drink_id', '$restaurant_id', '$username', $price, $zip);", $connection);
}

header("Location: thanks.php");
?>

<?php
	include 'header.php';
 ?>
			<p>You are submitting <strong><?= $_POST['restaurant'] . " " . $_POST['zip'] . " $" . $_POST['price'] . " " . $_POST['drink'] . " " . $_POST['drink_type'] ?></strong></p>
<?php
				include 'footer.php';
 ?>
