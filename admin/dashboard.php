<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: login.php");
  exit();
}
include 'includes/db.php';
include 'includes/header.php';
include 'includes/sidebar.php';

$totalInfluencers = $conn->query("SELECT COUNT(*) as total FROM influencers")->fetch_assoc()['total'];
$totalCampaigns = $conn->query("SELECT COUNT(*) as total FROM campaigns WHERE status = 'Active'")->fetch_assoc()['total'];
$totalLeads = $conn->query("SELECT COUNT(*) as total FROM leads")->fetch_assoc()['total'];
$totalBlogs = $conn->query("SELECT COUNT(*) as total FROM blogs")->fetch_assoc()['total'];
?>

<div class="d-flex flex-column min-vh-100" style="margin-left:220px;">
  <main class="admin-main flex-grow-1 px-2 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Dashboard</h2>
    </div>

    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="bg-primary text-white p-3 rounded">
          <h4><?= $totalInfluencers ?></h4>
          <p>Total Influencers</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="bg-info text-white p-3 rounded">
          <h4><?= $totalCampaigns ?></h4>
          <p>Active Campaigns</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="bg-success text-white p-3 rounded">
          <h4><?= $totalLeads ?></h4>
          <p>New Leads</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="bg-secondary text-white p-3 rounded">
          <h4><?= $totalBlogs ?></h4>
          <p>Total Blogs</p>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header fw-bold">Top Influencers</div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jane Doe <a href="#" class="btn btn-sm btn-outline-primary">View</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            John Smith <a href="#" class="btn btn-sm btn-outline-primary">View</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Alice Johnson <a href="#" class="btn btn-sm btn-outline-primary">View</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Michael Brown <a href="#" class="btn btn-sm btn-outline-primary">View</a>
          </li>
        </ul>
      </div>
    </div>
  </main>
</div>

<?php include 'includes/footer.php'; ?>
