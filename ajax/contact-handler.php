<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require_once '../includes/db.php'; // adjust path if needed
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');
echo json_encode(['success' => true, 'message' => 'Test OK']);
exit;


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
$stmt = $conn->prepare("INSERT INTO leads (topic, name, email, country, city, code, phone, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
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
    $mail->Body    = "
        <h3>New Contact Submission</h3>
        <p><strong>Topic:</strong> {$topic}</p>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> {$code} {$phone}</p>
        <p><strong>Country:</strong> {$country}</p>
        <p><strong>City:</strong> {$city}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ";

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
