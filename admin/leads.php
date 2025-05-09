<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: login.php");
  exit();
}
include 'includes/db.php';
include 'includes/header.php';
include 'includes/sidebar.php';

$result = $conn->query("SELECT * FROM leads ORDER BY created_at DESC");
?>

<div class="d-flex flex-column min-vh-100" style="margin-left:220px;">
  <main class="admin-main flex-grow-1 px-2 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Lead Management</h2>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle bg-white rounded shadow-sm overflow-hidden">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Topic</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>City</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Received</th>
          </tr>
        </thead>
        <tbody>
          <?php while($lead = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $lead['id'] ?></td>
            <td><?= htmlspecialchars($lead['topic']) ?></td>
            <td><?= htmlspecialchars($lead['name']) ?></td>
            <td><?= htmlspecialchars($lead['email']) ?></td>
            <td><?= htmlspecialchars($lead['country']) ?></td>
            <td><?= htmlspecialchars($lead['city']) ?></td>
            <td><?= htmlspecialchars($lead['phone_code'] . ' ' . $lead['phone_number']) ?></td>
            <td><?= htmlspecialchars($lead['message']) ?></td>
            <td><?= date("d M Y H:i", strtotime($lead['created_at'])) ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </main>
</div>

<?php include 'includes/footer.php'; ?>
