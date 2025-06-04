<?php
session_start();
include '../admin/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, role, verified FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $name, $hashed_password, $role, $verified);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id']  = $id;
            $_SESSION['name']     = $name;
            $_SESSION['role']     = $role;
            $_SESSION['verified'] = $verified;

            // ✅ Influencer - Check if profile is completed
            if ($role === 'influencer') {
                $check = $conn->prepare("SELECT id FROM profiles WHERE user_id = ?");
                $check->bind_param("i", $id);
                $check->execute();
                $check->store_result();

                if ($check->num_rows === 0) {
                    header("Location: ../complete-profile.php");
                    exit;
                } else {
                    header("Location: ../dashboard-influencer.php");
                    exit;
                }
            }

            // ✅ Brand User
            if ($role === 'brand') {
                header("Location: ../dashboard-brand.php");
                exit;
            }

            // ✅ Admin (if role is defined)
            if ($role === 'admin') {
                header("Location: ../admin/dashboard.php");
                exit;
            }
        }
    }

    // ❌ Login failed
    header("Location: ../login.php?error=invalid");
    exit;
}
