<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $slug = $_POST['slug'] ?: strtolower(str_replace(" ", "-", $title));
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $status = $_POST['status'];
    $published_at = $_POST['published_at'];
    $thumbnail = ""; // File upload handling can be added here

    $stmt = $conn->prepare("INSERT INTO blogs (title, slug, author, short_description, content, published_at) VALUES (?, ?, ?, ?, ?, ?)");
    $desc = substr(strip_tags($content), 0, 150);
    $stmt->bind_param("ssssss", $title, $slug, $author, $desc, $content, $published_at);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Blog added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error adding blog"]);
    }
}
?>
