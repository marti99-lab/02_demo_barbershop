<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/menu.css"> 
</head>
<body>
  <?php include 'frontend/components/menu.php'; ?> 

  <div class="form-wrapper">
    <h2 id="register-label">Register</h2>

    <p id="error-message" style="color: red;"></p>

    <form method="POST" action="../backend/auth/register_db.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>

      <button type="submit">Register</button>
    </form>
  </div>

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');

    if (error === 'exists') {
      document.getElementById('error-message').innerText = 'Username or Email already exists. Please choose another one.';
    }
  </script>
</body>
</html>
