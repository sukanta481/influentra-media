<?php
echo <<<HTML
<div class="collapse navbar-collapse d-lg-block" id="adminSidebar">
  <div class="bg-dark text-white" style="min-height:100vh; width:220px; position:fixed;">
    <div class="pt-3">
      <a href="dashboard.php" class="d-block px-3 py-2 text-white text-decoration-none">Dashboard</a>
      <a href="influencers.php" class="d-block px-3 py-2 text-white text-decoration-none">Influencers</a>
      <a href="blog.php" class="d-block px-3 py-2 text-white text-decoration-none">Blog Posts</a>
      <a href="faqs.php" class="d-block px-3 py-2 text-white text-decoration-none">FAQs</a>
      <a href="settings.php" class="d-block px-3 py-2 text-white text-decoration-none">Settings</a>
      <a href="admins.php" class="d-block px-3 py-2 text-white text-decoration-none">Admin Users</a>
      <a href="logout.php" class="d-block px-3 py-2 text-white text-decoration-none">Logout</a>
    </div>
  </div>
</div>
HTML;
?>