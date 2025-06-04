<?php
include 'includes/header.php';

// Redirect if not logged in or not influencer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'influencer') {
    header("Location: ../login.php");
    exit;
}
?>

<!-- Hamburger for mobile -->
<nav class="navbar navbar-dark bg-dark d-lg-none">
  <div class="container-fluid">
    <button class="btn text-white fs-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">&#9776;</button>
    <span class="navbar-brand mb-0 h1">Influentra</span>
  </div>
</nav>

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarLabel">
  <div class="offcanvas-header border-bottom">
    <h4 class="offcanvas-title" id="sidebarLabel">Influentra</h4>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column">
    <a href="#" class="nav-link text-white mb-2 active">Dashboard</a>
    <a href="#" class="nav-link text-white mb-2">Campaigns</a>
    <a href="#" class="nav-link text-white mb-2">Messages</a>
    <a href="#" class="nav-link text-white mb-2">Analytics</a>
    <a href="#" class="nav-link text-white mb-2">Profile</a>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <!-- Desktop Sidebar -->
    <nav class="col-lg-2 d-none d-lg-flex flex-column bg-dark text-white min-vh-100 position-fixed" style="width:240px;">
      <h4 class="text-center py-4">Influentra</h4>
      <a href="#" class="nav-link text-white mb-2 active">Dashboard</a>
      <a href="#" class="nav-link text-white mb-2">Campaigns</a>
      <a href="#" class="nav-link text-white mb-2">Messages</a>
      <a href="#" class="nav-link text-white mb-2">Analytics</a>
      <a href="#" class="nav-link text-white mb-2">Profile</a>
    </nav>
    <!-- Main Content -->
    <main class="col-12 col-lg-10 offset-lg-2" style="padding: 30px;">
      <h2 class="fw-bold mb-4">Dashboard</h2>
      <!-- Campaign Stats -->
      <div class="card mb-4">
        <div class="card-header bg-warning-subtle">Campaign Status & Stats</div>
        <div class="card-body d-flex flex-wrap justify-content-around text-center">
          <div class="flex-fill"><strong>Active</strong><br />2</div>
          <div class="flex-fill"><strong>Pending</strong><br />1</div>
          <div class="flex-fill"><strong>Completed</strong><br />6</div>
          <div class="flex-fill"><strong>Total</strong><br />$12,500</div>
        </div>
      </div>
      <!-- Earnings & Engagement -->
      <div class="row g-4 mb-4">
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header">Earnings & ROI</div>
            <div class="card-body">
              <div class="card-metric text-primary">📈 +35% Growth</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header">Engagement Metrics</div>
            <div class="card-body">
              <div class="card-metric text-info">🔵 72% Engagement</div>
            </div>
          </div>
        </div>
      </div>
      <!-- Messages & Feedback -->
      <div class="row g-4">
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header bg-warning-subtle">Messages</div>
            <div class="card-body">
              <ul class="list-unstyled mb-0">
                <li>- Brand X: “Need delivery status…”</li>
                <li>- Brand Y: “Send pricing…”</li>
                <li>- Brand Z: “Great collab! ❤️”</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header bg-primary-subtle">Feedback</div>
            <div class="card-body">
              <ul class="list-unstyled mb-0">
                <li>- “Great video quality!”</li>
                <li>- “Fast response time.”</li>
                <li>- “Would work again.”</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<style>
  @media (max-width: 991.98px) {
    main {
      padding: 24px 0 !important;
    }
    .position-fixed {
      position: static !important;
      width: 100% !important;
      min-height: auto !important;
    }
  }
  .bg-dark {
    background-color: #1f2937 !important;
  }
  .active {
    background: #374151 !important;
    border-radius: 5px;
  }
</style>

<?php include 'includes/footer.php'; ?>
