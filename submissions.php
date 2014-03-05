<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['loggedInUser'];
$connection = mysql_connect('127.0.0.1', 'root', '');
mysql_select_db('thrifty_drink', $connection);
$result = mysql_query("SELECT * FROM price_submissions ps JOIN drinks d ON ps.drink_id = d.drink_id WHERE username='$username'", $connection);

?>

<?php
include 'header.php';
?>
<h2>Your Price Submissions</h2>
<?php 
	while($row = mysql_fetch_array($result)) {
		echo "<p>Drink: <em>" . $row['name'] . "</em> Price: <em>$". $row['price'] ."</em></p>";
	}
?>

<?php
include 'footer.php';
?>