<html>
	<head></head>
	<body>
		<form>
		<input id="latlng" value="" type="text" />
		</form>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
		
			getLocation();
			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
				} else {
					x.innerHTML = "Geolocation is not supported by this browser.";
				}
			}

			function showPosition(position) {
				
		$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude +', ' + position.coords.longitude + '&sensor=true&result_type=postal_code&key=AIzaSyAGA5gNtINOy6Zx_JEkjBls3OPsj8P0gc8', function(result) {
			console.log(result);
			$('#latlng').val(result.results[0]['address_components'][0]['short_name']);
			console.log(result.results[0]['address_components'][0]['short_name']);
		});
				
			}
		</script>
	</body>
</html>