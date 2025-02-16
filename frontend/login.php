<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles/menu.css">
  <link rel="stylesheet" href="styles/main.css">
</head>
<body>
  <?php include 'frontend/components/menu.php'; ?>
  
  <div class="form-wrapper">
    <h2 id="headline">Login</h2>

    <p id="success-message" style="color: green;"></p>

    <form method="POST" action="../backend/auth/login_db.php">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required value="testapphere@test.com"><br><br>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required value="testtheapp"><br><br>
      <label id="test" for="test">Just click login for Test!</label>
      <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </div>

  <footer>
    <p>&copy; 2024 Martin Rübner. All rights reserved.</p>
  </footer>

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    if (success === 'registered') {
      document.getElementById('success-message').innerText = 'Registration successful! You can now log in.';
    }
  </script>
</body>
</html>
