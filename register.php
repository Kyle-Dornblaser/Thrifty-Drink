<?php
$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : null;
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;
$password_confirm = isset($_POST['password_confirm']) ? htmlspecialchars($_POST['password_confirm']) : null;
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
$zip = isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : null;

if ($password == $password && $password != null && $username != null && $email != null) {
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('thrifty_drink', $connection);
	$result = mysql_query("SELECT username FROM users WHERE username='$username';", $connection);
	$userInDatabase = mysql_fetch_array($result);
	//false if not in database // rows if in db
	if ($userInDatabase == false) {
		mysql_query("INSERT INTO users VALUES ('$username','$password','$email','$zip');", $connection);

		session_start();
		$_SESSION['loggedInUser'] = $username;
		header("Location: index.php");
		break;
	} else {
		header("Location: register.php?registration_error=username");
		break;
	}

}
?>

<?php
include 'header.php';
?>
<script>
	function passwordMatch() {
		if (document.getElementById('password').value != document.getElementById('password_confirm').value) {
			document.getElementById('password').style.borderColor = "#ff0000";
			document.getElementById('password_confirm').style.borderColor = "#ff0000";
			return false;
		} else {
			document.getElementById('password').style.borderColor = "#008B00";
			document.getElementById('password_confirm').style.borderColor = "#008B00";
			return true;
		}
	}
</script>
<div id="left">
	<h2>New User Registration</h2>
	<form action="register.php" method="post" onsubmit="return passwordMatch()">
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
				<td>Confirm Password</td>
				<td>
				<input type="password" name="password_confirm" id="password_confirm" onchange="passwordMatch()" required />
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
				<input type="email" name="email" required />
				</td>
			</tr>
			<tr>
				<td>Zip Code</td>
				<td>
				<input type="text" name="zip" />
				</td>
			</tr>
			<tr>
				<td>
				<input type="submit" />
				</td>
			</tr>
		</table>
	</form>
</div>
<div id="right">
	<h2>Benefits of signing up</h2>
	<ul>
		<li>View all your past submissions</li>
		<li>Save your favorite restaurants and bars for easy access (future feature)</li>
		<li>Not subject to CAPTCHA (future feature)</li>
	</ul>
</div>
<?php
include 'footer.php';
?>