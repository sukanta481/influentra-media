<?php
include_once __DIR__ . '/../../includes/config.php';
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Influentra Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .admin-header {
      background-color: #fff;
      border-bottom: 1px solid #ddd;
      padding: 10px 20px;
      z-index: 1045;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white admin-header sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">
      <img src="<?= $base_url ?>/img/logo.png" alt="Logo" style="height: 40px;">
    </a>
    <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
      ☰
    </button>
    <div class="d-none d-lg-block">
      <a href="#" class="me-3 text-decoration-none">Profile</a>
      <a href="logout.php" class="text-decoration-none">Logout</a>
    </div>
  </div>
</nav>
HTML;
?>
