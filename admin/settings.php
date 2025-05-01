<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: login.php");
  exit();
}
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<div class="d-flex flex-column min-vh-100" style="margin-left:220px;">
  <main class="admin-main flex-grow-1 px-3 px-md-4 py-4">
    <div class="container-fluid">
      <h2 class="mb-3">Settings</h2>
      <p>Manage content for settings here.</p>
    </div>
  </main>
  <?php include 'includes/footer.php'; ?>
</div>
