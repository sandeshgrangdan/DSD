<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <p id="lat" style="font-size: 40px;"></p>
    <p id="lng" style="font-size: 40px;"></p>
    <script>
      var x = document.getElementById("lat");
      var y = document.getElementById("lng");
      window.onload = getLocation();

      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }

      function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude ; 
        y.innerHTML = "Longitude: " + position.coords.longitude;
      }
      var lat = document.getElementById("lat").value;
      var lng = document.getElementById("lng").value;
      var map;
      function initMap() {
        var location = {lat :27.700769, lng : 85.300140};
        map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          zoom: 8
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