<?php
include '../admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'], $_POST['password'], $_POST['confirm_password'])) {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Basic validation
    if ($password !== $confirm || strlen($password) < 6) {
        header("Location: ../reset-password.php?token=" . urlencode($token) . "&error=1");
        exit;
    }

    // Look up the token
    $stmt = $conn->prepare("SELECT user_id, expires_at FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $expires_at);
        $stmt->fetch();

        if (strtotime($expires_at) > time()) {
            // Token valid, update password
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt2 = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt2->bind_param("si", $hashed, $user_id);
            $stmt2->execute();

            // Delete token
            $del = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
            $del->bind_param("s", $token);
            $del->execute();

            // Success!
            header("Location: ../login.php?reset=success");
            exit;
        }
    }
}

// Token invalid or expired
header("Location: ../reset-password.php?error=invalid");
exit;
?>
