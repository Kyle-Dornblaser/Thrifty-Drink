<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('thrifty_drink', $connection);
	$result = mysql_query("SELECT username, password FROM users WHERE username='$username'", $connection);

	$row = mysql_fetch_row($result);

	if ($row['1'] == $password) {
		session_start();
		$_SESSION['loggedInUser'] = $username;
		header("Location: index.php");
		break;
	}
}
?>

<?php
include 'header.php';
?>
<h2>Login</h2>
<form action="login.php" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td>
			<input type="text" name="username" required />
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
			<input type="password" name="password" id="password" required />
			</td>
		</tr>
		<tr>
			<td>
			<input type="submit" />
			</td>
		</tr>
	</table>
</form>
<?php
include 'footer.php';
?>