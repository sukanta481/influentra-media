<?php
include_once __DIR__ . '/../../includes/config.php';
?>
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
    body.bg-dark a {
      color: #f8f9fa;
    }
  </style>
  <link rel="stylesheet" href="../css/admin-dark-mode-dropdown.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white admin-header sticky-top">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <!-- Logo and breadcrumb -->
    <div class="d-flex align-items-center">
      <a class="navbar-brand fw-bold" href="#">
        <img src="<?= $base_url ?>/img/logo.png" alt="Logo" style="height: 40px;">
      </a>
      <nav aria-label="breadcrumb" class="ms-3">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= basename($_SERVER['PHP_SELF'], ".php") ?></li>
        </ol>
      </nav>
    </div>

    <!-- Theme toggle and profile dropdown -->
    <div class="d-flex align-items-center">
      <button id="themeToggle" class="btn btn-outline-secondary btn-sm me-3" title="Toggle Theme">🌓</button>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
          <img src="<?= $base_url ?>/img/Influencer_pic1.png" class="rounded-circle me-2" width="32" height="32" alt="User">
          <strong>Admin</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>

  </div>
</nav>

<script>
document.getElementById('themeToggle').addEventListener('click', () => {
  document.body.classList.toggle('bg-dark');
  document.body.classList.toggle('text-light');
});
</script>
