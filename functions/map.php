<?php

session_start();
$zone_id=$_SESSION['zone_id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <?php 
    echo '<p><a href="free.php?zone_id='.$zone_id.'" class="btn btn-primary btn-default btn-block">Назад </a></p></div></div>';
    ?>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 43.201430550399714, lng: 23.549132108164486},
          zoom: 14
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaxDuESLIfe1mCM3p0rXTb_DgR1uN77S4&callback=initMap"
    async defer></script>
  </body>
</html>