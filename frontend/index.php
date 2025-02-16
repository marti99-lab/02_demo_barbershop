<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbershop | Welcome</title>
  <link rel="stylesheet" href="styles/menu.css">
  <link rel="stylesheet" href="styles/index.css">
</head>
<body>
  <?php include 'frontend/components/menu.php'; ?>
  <div class="top-bar">
    <h1 id="welcome-msg">Welcome to Our Barbershop</h1>
    <div class="auth-links">
      <a href="https://learn-it-bonn.de">Back to Startpage</a>
    </div>
    <div class="auth-links">
      <a href="register.php">Register</a>
    </div>
  </div>

  <div class="hero">
    <h2>Where style meets tradition</h2>
    <p>Experience the best grooming in town</p>
  </div>

  <section class="services">
  <div class="service">
    <img src="images/barbershop1.jpg" alt="Haircut">
    <h3>Classic Haircut</h3>
    <p>Experience our signature cuts tailored to your style.</p>
    <p>Price: $25 - $40</p>
  </div>
  <div class="service">
    <img src="images/barbershop3.jpg" alt="Beard Trim">
    <h3>Beard Trim</h3>
    <p>Get your beard trimmed to perfection by our experts.</p>
    <p>Price: $15 - $25</p>
  </div>
  <div class="service">
    <img src="images/barbershop2.jpg" alt="Shave">
    <h3>Traditional Shave</h3>
    <p>Enjoy a relaxing hot towel shave for a smooth finish.</p>
    <p>Price: $20 - $35</p>
  </div>
</section>
  <section class="cta">
    <h2>Ready for a new look?</h2>
    <a href="book_appointment.php">Book an Appointment</a>
  </section>
  <section class="contact">
  <h2>Contact Us</h2>
  <p>53115 Bonn Meckenheimer Allee 17</p>
  <div class="contact-item">
    <img src="images/phone.jpg" alt="Phone Symbol" style="vertical-align: middle; margin-right: 10px;">
    <p style="display: inline;">Phone: (500) 000-000-000</p>
  </div>
  <div class="contact-item">
    <img src="images/email.jpg" alt="Email Symbol" style="vertical-align: middle; margin-right: 10px;">
    <p style="display: inline;">Email: noemail@barbershop.com</p>
  </div>
</section>
  <footer>
    <p>&copy; 2024 Martin Rübner. All rights reserved. <a href="image-license.php" target="_blank" style="font-size: 0.9em;">Image License here.</a></p>
  </footer>
</body>
</html>
