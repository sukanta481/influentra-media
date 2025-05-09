<?php
header('Content-Type: application/json');
include __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topic = htmlspecialchars(trim($_POST['topic']));
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $country = htmlspecialchars(trim($_POST['country'] ?? ''));
    $city = htmlspecialchars(trim($_POST['city'] ?? ''));
    $phone_code = htmlspecialchars(trim($_POST['phone_code'] ?? ''));
    $phone_number = htmlspecialchars(trim($_POST['phone_number'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!$name || !$email || !$message) {
        echo json_encode(["success" => false, "message" => "Required fields are missing."]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO leads (topic, name, email, country, city, phone_code, phone_number, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $topic, $name, $email, $country, $city, $phone_code, $phone_number, $message);
    $stmt->execute();

    // Email
    $to = "hello@influentra.media";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $mail_subject = "New Contact Form Submission: " . ($topic ?: "No Subject");
    $mail_body = "You have received a new message:\n\n"
        . "Topic: $topic\n"
        . "Name: $name\n"
        . "Email: $email\n"
        . "Country: $country\n"
        . "City: $city\n"
        . "Phone: $phone_code $phone_number\n"
        . "Message:\n$message";

    mail($to, $mail_subject, $mail_body, $headers);

    echo json_encode(["success" => true, "message" => "Thank you! Your message has been sent."]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
