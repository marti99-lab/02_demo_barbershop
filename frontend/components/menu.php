<?php
session_start();
?>
<nav class="top-nav">
  <div class="menu-toggle" id="mobile-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <ul id="menu">
    <li><a href="index.php">Start Page/About Us</a></li>
    <li><a href="dashboard.php">My Appointments</a></li>
    <li><a href="book_appointment.php">Book an Appointment</a></li>
    <li><a href="location.php">Find Us</a></li>
    <?php
      if (isset($_SESSION['user_id'])) {
          echo '<li><a href="../backend/auth/logout.php">Logout (' . htmlspecialchars($_SESSION['username']) . ')</a></li>';
      } else {
          echo '<li><a href="login.php">Login</a></li>';
      }
    ?>
  </ul>
</nav>

<script>
  const mobileMenu = document.getElementById('mobile-menu');
  const menu = document.getElementById('menu');

  mobileMenu.addEventListener('click', () => {
    menu.classList.toggle('showing');
  });
</script>
