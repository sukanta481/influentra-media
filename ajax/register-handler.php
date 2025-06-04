<?php
include '../admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Secure hash
    $role     = $_POST['role'];

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        header("Location: ../register.php?error=email_exists");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, verified) VALUES (?, ?, ?, ?, 0)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {
        header("Location: ../login.php?registered=1");
        exit;
    } else {
        header("Location: ../register.php?error=failed");
        exit;
    }

    $check->close();
    $stmt->close();
}
?>
