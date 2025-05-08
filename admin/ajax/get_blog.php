<?php
include '../includes/db.php';

if (isset($_POST['id'])) {
  $id = intval($_POST['id']);
  $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $blog = $result->fetch_assoc();

  echo json_encode($blog);
} else {
  echo json_encode(['error' => 'Invalid ID']);
}
?>
