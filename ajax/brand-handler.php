<?php
require_once '../includes/db.php';
require_once '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
header('Content-Type: application/json');

// Collect and sanitize form data
$brand_name     = trim($_POST['brand_name'] ?? '');
$contact_person = trim($_POST['contact_person'] ?? '');
$email          = trim($_POST['email'] ?? '');
$phone_code     = trim($_POST['phone_code'] ?? '');
$phone_number   = trim($_POST['phone_number'] ?? '');
$country        = trim($_POST['country'] ?? '');
$city           = trim($_POST['city'] ?? '');
$website        = trim($_POST['website'] ?? '');
$interest       = trim($_POST['interest'] ?? '');
$message        = trim($_POST['message'] ?? '');

// Validate required
if (!$brand_name || !$contact_person || !$email || !$phone_number || !$country || !$city || !$interest || !$message) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
    exit;
}

// Store in DB (table: brand_leads, update as needed)
$stmt = $conn->prepare("INSERT INTO brand_leads (brand_name, contact_person, email, phone_code, phone_number, country, city, website, interest, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $brand_name, $contact_person, $email, $phone_code, $phone_number, $country, $city, $website, $interest, $message);
$stmt->execute();

// Send notification email (to you)
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hello@influentra.media';
    $mail->Password   = $_ENV['SMTP_PASS'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->setFrom('hello@influentra.media', 'Brand Lead');
    $mail->addAddress('hello@influentra.media');
    $mail->addAddress('hello.influentra@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = "New Brand Lead: $brand_name";
    $mail->Body    = "
      <h2 style='color:#4350ff;margin-bottom:0;'>New Brand Contact Submission</h2>
      <hr style='margin:12px 0 18px 0;'>
      <table style='font-size:1rem;color:#262651;width:100%;max-width:480px;'>
        <tr><td><b>Brand Name:</b></td><td>$brand_name</td></tr>
        <tr><td><b>Contact Person:</b></td><td>$contact_person</td></tr>
        <tr><td><b>Email:</b></td><td>$email</td></tr>
        <tr><td><b>Phone:</b></td><td>$phone_code $phone_number</td></tr>
        <tr><td><b>Country:</b></td><td>$country</td></tr>
        <tr><td><b>City:</b></td><td>$city</td></tr>
        <tr><td><b>Website:</b></td><td>$website</td></tr>
        <tr><td><b>Looking for:</b></td><td>$interest</td></tr>
        <tr><td colspan='2' style='padding-top:8px;'><b>Message:</b><br><div style='color:#444'>$message</div></td></tr>
      </table>
      <div style='margin-top:22px;text-align:center'>
        <img src='https://influentra.media/img/logo.png' alt='Influentra Media' style='height:36px;margin-top:8px;'>
      </div>
    ";

    $mail->send();
} catch (Exception $e) {
    error_log("Brand Lead Email failed: {$mail->ErrorInfo}");
    // Optional: echo json_encode(['success'=>false,'message'=>'Mail failed']);
}

echo json_encode(['success' => true, 'message' => 'Thank you for contacting us! We will reach you soon.']);
?>
