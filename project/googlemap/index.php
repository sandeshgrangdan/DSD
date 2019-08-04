<!DOCTYPE html>
<html>
<head>
	<title>Map</title>
	<style>
	#id{
		width: 400px;
		height: 400px;
		} 
	</style>
</head>
<body>
  <div id="maps"></div>
  <script>
  	function initMap() {
  		var location = {lat :27.700769, lng : 85.300140};
  		var map = new google.maps.Map(document.getElementById("map"),{
  			zoom: 4,
  			center: location
  		});
  		var marker = new google.maps.Marker({
  			position: location,
  			map: map
  		});
  	}
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBISQUK7ltRgWLOhmn_9iAInDNP4cQpmr0&callback=initMap"
    async defer></script>
</body>
</html>