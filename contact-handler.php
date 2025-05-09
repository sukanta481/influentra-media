<?php
require_once 'includes/db.php';
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

// reCAPTCHA validation
function validateRecaptcha($token) {
    $secret = $_ENV['RECAPTCHA_SECRET']; // set this in .env
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$token}"
    );
    $result = json_decode($response, true);
    return $result["success"] === true && $result["score"] >= 0.5;
}

// Collect and sanitize form data
$topic = $_POST['topic'] ?? '';
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$country = $_POST['country'] ?? '';
$city = $_POST['city'] ?? '';
$code = $_POST['phone_code'] ?? '';
$phone = $_POST['phone_number'] ?? '';
$message = $_POST['message'] ?? '';
$recaptcha = $_POST['g-recaptcha-response'] ?? '';

if (!validateRecaptcha($recaptcha)) {
    http_response_code(403);
    echo json_encode(['status' => 'recaptcha_failed']);
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
}

echo json_encode(['status' => 'success']);
?>
