<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaflet Map Example</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/menu.css">
  <style>

    #map {
      height: 400px;  
      width: 100%;
      margin: 20px 0;
    }
  </style>
</head>
<body>

<?php include 'frontend/components/menu.php'; ?>

<h2 class="centered-text">Our Location</h2>
<p class="centered-text">Address of 53115 Bonn Meckenheimer Allee 17</p>
<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([50.73438, 7.09549], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([50.73438, 7.09549]).addTo(map)
      .bindPopup('Our Location')
      .openPopup();
  });
</script>
<section class="centered-text">
  <h2 class="centered-text">Contact Us</h2>
  <p class="centered-text">53115 Bonn Meckenheimer Allee 17</p>
  <div class="contact-item">
    <img src="images/phone.jpg" alt="Phone Symbol" style="vertical-align: middle; margin-right: 10px;">
    <p style="display: inline;">Phone: (500) 000-000-000</p>
  </div>
  <div class="contact-item">
    <img src="images/email.jpg" alt="Email Symbol" style="vertical-align: middle; margin-right: 10px;">
    <p style="display: inline;">Email: noemail@barbershop.com</p>
  </div>
</section>
</body>
</html>
