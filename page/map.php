
<h2>MAP</h2>
<div id="map" style="width:50%;height:400px;margin:auto" center></div>

<script>
  var someVar;
  function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
      } else {
          alert("Geolocation is not supported by this browser.");
      }
  }
  function showPosition(position) {
    var pointA = new google.maps.LatLng(35.916933, -84.010125),
      pointB = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
      myOptions = {
        zoom: 7,
        center: pointA
      },
      map = new google.maps.Map(document.getElementById('map'), myOptions),
      // Instantiate a directions service.
      directionsService = new google.maps.DirectionsService,
      directionsDisplay = new google.maps.DirectionsRenderer({
        'map': map
      });

    calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
  }

function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
  directionsService.route({
    origin: pointA,
    destination: pointB,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    };
  });
};
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByZB6AJbRLR5jYeCCuHnOI2MlFqwyYdm0&callback=getLocation"></script>

<!-- AIzaSyByZB6AJbRLR5jYeCCuHnOI2MlFqwyYdm0 -->
