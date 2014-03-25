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



		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<div id="container">
			<header>
				<h1><a href="index.php">Thrifty Drinks Alpha</a></h1>
				<nav>
					<ul>
						<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if(isset($_SESSION['loggedInUser'])) {
$username = $_SESSION['loggedInUser'];
						?>
						<li>
							Welcome <?= $username ?> (<a href="logout.php">Logout</a>)
						</li>
						<li>
							<a href="submissions.php">Your Submissions</a>
						</li>
						<li>
							<a href="saved_restaurants.php">Saved Restaurants</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="register.php">Register</a>
						</li>
						<li>
							<a href="login.php">Login</a>
						</li>
						<?php } ?>
					</ul>
				</nav>
				<div class="clear"></div>
			</header>
