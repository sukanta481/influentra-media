<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: login.php");
  exit();
}
include 'includes/db.php';
include 'includes/header.php';
include 'includes/sidebar.php';

$influencers = 0;
$leads = 0;
$campaigns = 0;
$blogs = 0;
?>

<style>
  @media (min-width: 992px) {
    .with-sidebar {
      margin-left: 220px;
    }
  }
</style>

<div class="d-flex flex-column min-vh-100 with-sidebar">
  <main class="admin-main flex-grow-1 px-3 px-md-4 py-4 mt-5 mt-lg-0">
    <div class="container-fluid">
      <h2 class="mb-4">Dashboard</h2>
      <div class="row g-3 mb-4">
        <div class="col-md-3"><div class="card text-white bg-primary p-3"><h5 class="mb-0"><?= $influencers ?></h5><small>Total Influencers</small></div></div>
        <div class="col-md-3"><div class="card text-white bg-info p-3"><h5 class="mb-0"><?= $campaigns ?></h5><small>Active Campaigns</small></div></div>
        <div class="col-md-3"><div class="card text-white bg-success p-3"><h5 class="mb-0"><?= $leads ?></h5><small>New Leads</small></div></div>
        <div class="col-md-3"><div class="card text-white bg-secondary p-3"><h5 class="mb-0"><?= $blogs ?></h5><small>Total Blogs</small></div></div>
      </div>
      <div class="row g-4 mb-4">
        <div class="col-12 col-md-6">
          <div class="card shadow-sm p-3">
            <h5>Top Influencers</h5>
            <ul class="list-group list-group-flush mt-3">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Jane Doe <a href="#" class="btn btn-sm btn-primary">View</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                John Smith <a href="#" class="btn btn-sm btn-primary">View</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Alice Johnson <a href="#" class="btn btn-sm btn-primary">View</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Michael Brown <a href="#" class="btn btn-sm btn-primary">View</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card shadow-sm p-3">
            <h5>Recent Campaigns</h5>
            <ul class="list-group list-group-flush mt-3">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Summer Collection <span class="badge bg-success">Active</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Product Launch <span class="badge bg-success">Active</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Holiday Specials <span class="badge bg-secondary">Inactive</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Brand Awareness <span class="badge bg-secondary">Inactive</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card shadow-sm p-4">
        <h5>Top Influencers</h5>
        <div style="height: 120px;" class="d-flex align-items-center justify-content-center text-muted">
          <em>(Graph Placeholder)</em>
        </div>
      </div>
    </div>
  </main>
  <?php include 'includes/footer.php'; ?>
</div>
