<?php
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Influentra Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .admin-header {
      background-color: #fff;
      border-bottom: 1px solid #ddd;
      padding: 10px 20px;
      z-index: 1040;
    }
    .admin-main {
      padding: 20px;
    }
    .admin-footer {
      background: #f9f9f9;
      text-align: center;
      font-size: 14px;
      padding: 10px;
      border-top: 1px solid #ddd;
      margin-top: auto;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white admin-header sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#"><img src="../img/logo.png" alt="Logo" style="height: 40px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminSidebar" aria-controls="adminSidebar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-none d-lg-block">
      <a href="#" class="me-3 text-decoration-none">Profile</a>
      <a href="logout.php" class="text-decoration-none">Logout</a>
    </div>
  </div>
</nav>
HTML;
?>