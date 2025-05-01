<?php
session_start();
include __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT username, password, role FROM admins WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();
    if (password_verify($password, $admin['password'])) {
      $_SESSION['admin_logged_in'] = true;
      $_SESSION['admin_username'] = $admin['username'];
      $_SESSION['admin_role'] = $admin['role'];
      header("Location: index.php");
      exit();
    } else {
      $_SESSION['error'] = "Incorrect password. Please try again.";
    }
  } else {
    $_SESSION['error'] = "No admin found with that username.";
  }

  header("Location: login.php");
  exit();
} else {
  $_SESSION['error'] = "Invalid request method.";
  header("Location: login.php");
  exit();
}
?>