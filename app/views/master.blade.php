<!DOCTYPE html>
<html lang="en">
	<head>
		<script>
			if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
				var msViewportStyle = document.createElement("style");
				msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
				document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
			}
		</script>
		<style>
			@-webkit-viewport{width:device-width}
			@-moz-viewport{width:device-width}
			@-ms-viewport{width:device-width}
			@-o-viewport{width:device-width}
			@viewport{width:device-width}
		</style>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="/i/favicon.ico">
		<title>Thrifty Drink</title>

		<!-- Bootstrap core CSS -->
		<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="/bootstrap/css/style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<div class="row">
			<div class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/">Thrifty Drink</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li>
								<a href="/restaurants">Restaurants</a>
							</li>
							<li>
								<a href="#">Drinks</a>
							</li>
						</ul>
						@if(Auth::guest())
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="/signin">Sign In</a>
							</li>
							<li>
								<a href="/register">Register</a>
							</li>
						</ul>
						@elseif(Auth::check())
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="/mysubmissions">My Submissions</a>
							</li>
							<li>
								<a href="#">Preferences</a>
							</li>
							<li>
								<a href="/logout">Logout</a>
							</li>
						</ul>
						@endif
					</div><!--/.navbar-collapse -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="jumbotron">
				<div class="container">
					@yield('jumbotron')
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">

				@if(Session::has('flash_notice'))
				<div class="col-sm-12">
					<div class="alert alert-dismissable alert-info">
						<button type="button" class="close" data-dismiss="alert">
							×
						</button>
						{{ Session::get('flash_notice') }}
					</div>
				</div>
				@endif

				@yield('main-content')
			</div>
		</div>
		<footer>
			<div class="row col-sm-12 footer">
				<div class="container">
					<div class="col-sm-2">
						<h4>Navigation</h4>
						<nav>
							<ul>
								<li>
									{{ HTML::linkRoute('home', 'Home') }}
								</li>
								<li>
									{{ HTML::linkRoute('restaurants', 'Restaurants') }}
								</li>
								<li>
									{{ HTML::linkRoute('home', 'Drinks') }}
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-sm-2">
						<h4>Development</h4>
						<ul>
							<li>
								<a href="https://github.com/Kyle-Dornblaser/Thrifty-Drink/">GitHub</a>
							</li>
							<li>
								<a href="http://www.dornblaser.me">Developer's Website</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-4">

					</div>
				</div>
			</div>
		</footer>
		@yield('scripts')
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="/bootstrap/js/bootstrap.min.js"></script>
		<script src="/bootstrap/js/jquery.validate.min.js"></script>
		<script src="/bootstrap/js/fade.js"></script>
	</body>
</html>
