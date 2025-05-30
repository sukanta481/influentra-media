<?php
require_once '../includes/db.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

// Collect form data
$name       = trim($_POST['name'] ?? '');
$email      = trim($_POST['email'] ?? '');
$country    = trim($_POST['country'] ?? '');
$city       = trim($_POST['city'] ?? '');
$instagram  = trim($_POST['instagram_handle'] ?? '');
$youtube    = trim($_POST['youtube_channel'] ?? '');
$tiktok     = trim($_POST['tiktok_handle'] ?? '');
$phone_code = trim($_POST['phone_code'] ?? '');
$phone      = trim($_POST['phone_number'] ?? '');
$followers  = trim($_POST['followers_count'] ?? '');
$niche      = trim($_POST['niche'] ?? '');
$message    = trim($_POST['message'] ?? '');

// Basic validation (add more if you want)
if (!$name || !$email || !$country || !$niche) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
    exit;
}

// Store in DB
$stmt = $conn->prepare(
    "INSERT INTO influencer_leads 
        (name, email, country, city, instagram_handle, youtube_channel, tiktok_handle, phone_code, phone_number, followers_count, niche, message) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param("ssssssssssss", $name, $email, $country, $city, $instagram, $youtube, $tiktok, $phone_code, $phone, $followers, $niche, $message);

if ($stmt->execute()) {
    // Send notification email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hello@influentra.media';
        $mail->Password   = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('hello@influentra.media', 'Influentra Influencer Form');
        $mail->addAddress('hello@influentra.media');
        $mail->addAddress('hello.influentra@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = "New Influencer Lead: $name";
        $mail->Body    = "
            <h3>New Influencer Submission</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Country:</strong> {$country}</p>
            <p><strong>City:</strong> {$city}</p>
            <p><strong>Instagram:</strong> {$instagram}</p>
            <p><strong>YouTube:</strong> {$youtube}</p>
            <p><strong>TikTok:</strong> {$tiktok}</p>
            <p><strong>Niche:</strong> {$niche}</p>
            <p><strong>Followers:</strong> {$followers}</p>
            <p><strong>Phone:</strong> {$phone_code} {$phone}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";
        $mail->send();
    } catch (Exception $e) {
        error_log("Email failed: {$mail->ErrorInfo}");
    }
    echo json_encode(['success' => true, 'message' => 'Thank you! We will contact you soon.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save data. ' . $stmt->error]);
}
?>
