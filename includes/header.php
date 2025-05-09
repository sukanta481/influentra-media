<?php
include_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Influentra</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= $base_url ?>/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
      </ul>
    </div>
  </div>
</nav>
