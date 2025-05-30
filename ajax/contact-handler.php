<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require_once '../includes/db.php'; // adjust path if needed
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Collect and sanitize form data
$topic   = trim($_POST['topic'] ?? '');
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$country = trim($_POST['country'] ?? '');
$city    = trim($_POST['city'] ?? '');
$code    = trim($_POST['phone_code'] ?? '');
$phone   = trim($_POST['phone_number'] ?? '');
$message = trim($_POST['message'] ?? '');

// Basic validation
if (!$topic || !$name || !$email || !$country || !$city || !$code || !$phone || !$message) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Store lead in DB
$stmt = $conn->prepare("INSERT INTO leads (topic, name, email, country, city, phone_code, phone_number, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $topic, $name, $email, $country, $city, $code, $phone, $message);
$stmt->execute();

// Send email via Hostinger SMTP
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hello@influentra.media';
    $mail->Password   = $_ENV['SMTP_PASS']; // from .env
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->setFrom('hello@influentra.media', 'Influentra Contact');
    $mail->addAddress('hello@influentra.media');
    $mail->addAddress('hello.influentra@gmail.com'); // Send to both

    $mail->isHTML(true);
    $mail->Subject = "New Contact Query from $name";
    $mail->Body = '
      <div style="max-width:540px;margin:24px auto;padding:24px 18px;background:#f7f9fa;border-radius:14px;font-family:Inter,Arial,sans-serif;font-size:16px;color:#232a31;box-shadow:0 2px 8px rgba(44,62,80,0.05);">
        <div style="text-align:center;margin-bottom:18px;">
          <img src="https://influentra.media/img/logo.png" alt="Influentra Media" style="height:40px;">
        </div>
        <h2 style="color:#003366;font-size:22px;margin-top:0;margin-bottom:20px;text-align:center;">
          🚀 New Contact Submission
        </h2>
        <table style="width:100%;border-collapse:collapse;">
          <tr>
            <td style="padding:8px 0;width:130px;"><strong>Topic:</strong></td>
            <td style="padding:8px 0;">'.htmlspecialchars($topic).'</td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><strong>Name:</strong></td>
            <td style="padding:8px 0;">'.htmlspecialchars($name).'</td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><strong>Email:</strong></td>
            <td style="padding:8px 0;"><a href="mailto:'.htmlspecialchars($email).'" style="color:#1a73e8;text-decoration:none;">'.htmlspecialchars($email).'</a></td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><strong>Phone:</strong></td>
            <td style="padding:8px 0;">'.htmlspecialchars($code).' '.htmlspecialchars($phone).'</td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><strong>Country:</strong></td>
            <td style="padding:8px 0;">'.htmlspecialchars($country).'</td>
          </tr>
          <tr>
            <td style="padding:8px 0;"><strong>City:</strong></td>
            <td style="padding:8px 0;">'.htmlspecialchars($city).'</td>
          </tr>
          <tr>
            <td style="padding:8px 0;vertical-align:top;"><strong>Message:</strong></td>
            <td style="padding:8px 0;">'.nl2br(htmlspecialchars($message)).'</td>
          </tr>
        </table>
        <div style="border-top:1px solid #eee;margin:28px 0 0 0;padding-top:18px;text-align:center;color:#888;font-size:14px;">
          Influentra Media<br>
          <a href="mailto:hello@influentra.media" style="color:#1a73e8;text-decoration:none;">hello@influentra.media</a>
        </div>
      </div>
    ';

    $mail->send();
} catch (Exception $e) {
    error_log("Email failed: {$mail->ErrorInfo}");
    // Optionally, you can set an error message for the user here
}

// Always return a JSON response
echo json_encode([
    'success' => true,
    'message' => 'Thank you for contacting us! Our team will reach out to you soon.'
]);
?>
