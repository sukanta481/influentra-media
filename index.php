
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Influentra Media</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    a:hover {
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }
    .btn:hover {
      transform: scale(1.03);
      transition: transform 0.2s ease;
    }
  </style>
</head>
<body>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/main-section.php'; ?>
  <?php include 'includes/services-section.php'; ?>
  <?php include 'includes/technology-driven-section.php'; ?>
  <?php include 'includes/category-section.php'; ?>
  <?php include 'pages/faq-section.php'; ?>
  <?php include 'includes/contact-modal.php'; ?>
<?php include 'includes/footer.php'; ?>
</body>
</html>
