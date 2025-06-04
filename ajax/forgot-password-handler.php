<?php
include '../admin/includes/db.php';

// Load Composer's autoloader (update the path as needed)
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    // Find user by email
    $stmt = $conn->prepare("SELECT id, name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $name);
        $stmt->fetch();

        // Generate token and expiry (30 min)
        $token = bin2hex(random_bytes(32));
        $expires_at = date('Y-m-d H:i:s', strtotime('+30 minutes'));

        // Remove previous tokens for this user
        $conn->query("DELETE FROM password_resets WHERE user_id = $user_id");

        // Insert new token
        $stmt2 = $conn->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)");
        $stmt2->bind_param("iss", $user_id, $token, $expires_at);
        $stmt2->execute();

        // Prepare reset link (change to your actual domain)
        $reset_link = "https://influentra.media/reset-password.php?token=$token";

        // --- SEND EMAIL USING PHPMailer ---
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hello@influentra.media';
            $mail->Password   = $_ENV['SMTP_PASS']; // Make sure to set this in your .env
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('hello@influentra.media', 'Influentra Contact');
            $mail->addAddress($email, $name);
            $mail->addAddress('hello@influentra.media'); // Admin copy
            $mail->addAddress('hello.influentra@gmail.com'); // Admin copy

            $mail->isHTML(true);
            $mail->Subject = "Reset your Influentra password";
            $mail->Body = "
            <div style='background: #f4f6f8; padding: 32px 0;'>
              <div style='max-width: 480px; margin:40px auto; background: #fff; border-radius:16px; box-shadow:0 0 24px #e4e8f0; overflow:hidden; font-family:sans-serif;'>
                <div style='background: #fff; padding: 24px 0 0 0; text-align:center;'>
                  <img src='https://influentra.media/img/logo.png' alt='Influentra' style='height:48px; margin-bottom: 10px;'><br>
                </div>
                <div style='padding:0 24px 18px 24px;'>
                  <div style='color: #2563eb; font-size: 22px; font-weight: bold; margin: 20px 0 10px 0; text-align: center;'>Password Reset Request</div>
                  <p style='font-size:16px;color:#222'>Hi <b>$name</b>,</p>
                  <p style='color:#444;line-height:1.6'>
                    We received a request to reset your Influentra account password.<br>
                    Click the button below to choose a new password.<br>
                    <span style='font-size:13px;color:#666;'>This link is valid for 30 minutes.</span>
                  </p>
                  <div style='text-align:center;margin:32px 0 24px 0;'>
                    <a href='$reset_link' style='background: #2563eb; color: #fff; padding: 14px 36px; border-radius: 8px; font-weight: bold; font-size: 20px; text-decoration:none; display:inline-block;'>Reset Password</a>
                  </div>
                  <p style='font-size:14px;color:#999; margin-bottom:0;'>
                    If you did not request this, you can ignore this email.<br>
                    For security, this link can only be used once.
                  </p>
                </div>
                <div style='background:#f4f6f8; padding:12px 24px; text-align:center; font-size:13px;color:#aaa;'>
                  &copy; ".date('Y')." Influentra. All rights reserved.
                </div>
              </div>
            </div>
            ";
            $mail->AltBody = "Hi $name,\n\nWe received a password reset request for your Influentra account.\nUse this link to reset your password (valid for 30 minutes):\n$reset_link\n\nIf you didn't request this, just ignore this email.\n";

            $mail->send();
        } catch (Exception $e) {
            // Optionally log $mail->ErrorInfo for debugging, but do not show to users
        }
        // Always redirect to success for security
        header("Location: ../forgot-password.php?success=1");
        exit;
    }
}

// Always redirect to success to avoid leaking info
header("Location: ../forgot-password.php?success=1");
exit;
?>
