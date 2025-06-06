<?php
include_once __DIR__ . '/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'Influentra' ?></title>
  <?php if (isset($page_description)): ?>
  <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
  <?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= $base_url ?>/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .btn-gradient {
      background: linear-gradient(to right, #4f46e5, #3b82f6);
      color: white;
      font-weight: 600;
      padding: 8px 20px;
      border: none;
      border-radius: 50px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
      text-decoration: none;
    }

    .btn-gradient:hover {
      transform: translateY(-2px);
      background: linear-gradient(to right, #3b82f6, #2563eb);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
      color: white;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= $base_url ?>/index.php">
      <img src="<?= $base_url ?>/img/logo.png" alt="Logo" style="height: 40px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/contact.php">Contact</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold text-primary" href="#" role="button" data-bs-toggle="dropdown">
              <?= htmlspecialchars($_SESSION['name']) ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="<?= $base_url ?>/edit-profile.php">Edit Profile</a></li>
              <li><a class="dropdown-item" href="<?= $base_url ?>/logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="<?= $base_url ?>/login.php" class="btn btn-gradient ms-3">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
