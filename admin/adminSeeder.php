<?php
include __DIR__ . '/includes/db.php';

$username = 'admin';
$plain_password = 'admin123';
$role = 'superadmin';

$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

// Check if the admin already exists
$check = $conn->prepare("SELECT id FROM admins WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$check->store_result();

if ($check->num_rows === 0) {
    $stmt = $conn->prepare("INSERT INTO admins (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "✅ Admin inserted successfully.";
    } else {
        echo "❌ Failed to insert admin: " . $stmt->error;
    }
} else {
    echo "ℹ️ Admin user already exists. No changes made.";
}
?>
