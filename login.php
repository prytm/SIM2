<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="anjay.css">
  <title>Login Page</title>
</head>

<body>

  <div class="login-container">
    <h2>Login</h2>
    <form class="login-form" method="POST" action="postLogin.php" autocomplete="off">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <p style="text-align: center; color: red;"><?= (isset($_SESSION["invalid_credentials"])) ? $_SESSION["invalid_credentials"] : ''; ?></p>
      <div class="form-group">
        <a style="text-align:center;" href="register.php">Belum punya akun? Register</a>
        <br><br><br>
        <button type="submit">Login</button>
      </div>
    </form>
  </div>

</body>

</html>

<?php
session_destroy();
?>