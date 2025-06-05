<?php
session_start();
include '../admin/includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id     = $_SESSION['user_id'];
$bio         = $_POST['bio'];
$category    = $_POST['category'];
$instagram   = $_POST['instagram'];
$youtube     = $_POST['youtube'];
$x           = $_POST['x'];
$tiktok      = $_POST['tiktok'];
$amazon      = $_POST['amazon'];
$portfolio1  = $_POST['portfolio1'];
$portfolio2  = $_POST['portfolio2'];

$upload_dir_profile = '../uploads/profile/';
$upload_dir_media = '../uploads/media/';
if (!is_dir($upload_dir_profile)) mkdir($upload_dir_profile, 0755, true);
if (!is_dir($upload_dir_media)) mkdir($upload_dir_media, 0755, true);

// Upload profile image
$profile_image = '';
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
    $image_name = uniqid() . '_' . basename($_FILES['profile_image']['name']);
    $target_path = $upload_dir_profile . $image_name;

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_path)) {
        $profile_image = 'uploads/profile/' . $image_name;
    }
}

// Insert into profiles table
$stmt = $conn->prepare("INSERT INTO profiles 
(user_id, bio, category, instagram, youtube, x, tiktok, amazon, portfolio1, portfolio2, profile_image) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssss", 
    $user_id, $bio, $category, $instagram, $youtube, $x, $tiktok, $amazon, $portfolio1, $portfolio2, $profile_image
);
$stmt->execute();

// Upload multiple media files
if (!empty($_FILES['media_files']['name'][0])) {
    foreach ($_FILES['media_files']['tmp_name'] as $index => $tmp_name) {
        if ($_FILES['media_files']['error'][$index] === 0) {
            $original_name = basename($_FILES['media_files']['name'][$index]);
            $unique_name = uniqid() . '_' . $original_name;
            $target_file = $upload_dir_media . $unique_name;

            if (move_uploaded_file($tmp_name, $target_file)) {
                $file_path = 'uploads/media/' . $unique_name;
                $file_type = $_FILES['media_files']['type'][$index];
                if (strpos($file_type, 'image') === 0) {
                    $type = 'image';
                } elseif (strpos($file_type, 'video') === 0) {
                    $type = 'video';
                } else {
                    $type = 'video';
                }

                $insert_media = $conn->prepare("INSERT INTO media_gallery (user_id, file_path, type) VALUES (?, ?, ?)");
                $insert_media->bind_param("iss", $user_id, $file_path, $type);
                $insert_media->execute();
            }
        }
    }
}

header("Location: ../admin/dashboard.php");
exit;
?>
