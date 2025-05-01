<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f7f9fc;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-box {
      background: white;
      border-radius: 12px;
      padding: 40px 30px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.05);
      width: 100%;
      max-width: 400px;
    }
    .login-box img {
      width: 80px;
      display: block;
      margin: 0 auto 20px;
    }
    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: bold;
    }
    .form-control::placeholder {
      font-size: 14px;
    }
    .login-box .form-control {
      padding: 12px 14px;
    }
    .login-box .btn {
      padding: 12px;
      font-size: 16px;
    }
    .text-end a {
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <img src="../img/logo.png" alt="Logo">
    <h2>Login</h2>
<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-danger">
    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
  </div>
<?php endif; ?>
    <form method="POST" action="validate_login.php">
      <div class="mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="mb-3 text-end">
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</body>
</html>
