<?php
include '../includes/db.php';
header('Content-Type: application/json');

$action = $_POST['action'] ?? '';

if ($action === 'add') {
    $title = $_POST['title'];
    $thumbnailPath = null;
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $filename = time() . '_' . basename($_FILES['thumbnail']['name']);
        $targetPath = $uploadDir . $filename;
        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetPath)) {
            $thumbnailPath = 'uploads/' . $filename;
        }
    }
    $slug = $_POST['slug'] ?: strtolower(str_replace(" ", "-", $title));
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $status = $_POST['status'];
    $published_at = $_POST['published_at'];
    $thumbnail = $thumbnailPath ?? '';
    $desc = substr(strip_tags($content), 0, 150);

    $stmt = $conn->prepare("INSERT INTO blogs (title, slug, author, thumbnail, short_description, content, published_at, category, meta_title, meta_description, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $title, $slug, $author, $thumbnail, $desc, $content, $published_at, $category, $meta_title, $meta_description, $status);

    echo $stmt->execute()
        ? json_encode(["success" => true, "message" => "Blog added successfully"])
        : json_encode(["success" => false, "message" => "Failed to add blog"]);
}

elseif ($action === 'edit') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $thumbnailPath = null;
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $filename = time() . '_' . basename($_FILES['thumbnail']['name']);
        $targetPath = $uploadDir . $filename;
        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetPath)) {
            $thumbnailPath = 'uploads/' . $filename;
        }
    }
    $slug = $_POST['slug'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $status = $_POST['status'];
    $published_at = $_POST['published_at'];
    $desc = substr(strip_tags($content), 0, 150);

    if ($thumbnailPath) {
        $stmt = $conn->prepare("UPDATE blogs SET title=?, slug=?, author=?, thumbnail=?, short_description=?, content=?, published_at=?, category=?, meta_title=?, meta_description=?, status=? WHERE id=?");
        $stmt->bind_param("sssssssssssi", $title, $slug, $author, $thumbnailPath, $desc, $content, $published_at, $category, $meta_title, $meta_description, $status, $id);
    } else {
        $stmt = $conn->prepare("UPDATE blogs SET title=?, slug=?, author=?, short_description=?, content=?, published_at=?, category=?, meta_title=?, meta_description=?, status=? WHERE id=?");
        $stmt->bind_param("ssssssssssi", $title, $slug, $author, $desc, $content, $published_at, $category, $meta_title, $meta_description, $status, $id);
    }

    echo $stmt->execute()
        ? json_encode(["success" => true, "message" => "Blog updated successfully"])
        : json_encode(["success" => false, "message" => "Failed to update blog"]);
}


elseif ($action === 'delete') {
    $id = $_POST['id'];

    // 1. Get the thumbnail path first
    $stmt = $conn->prepare("SELECT thumbnail FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($thumbnail);
    $stmt->fetch();
    $stmt->close();

    // 2. Delete the image file (if not empty and doesn't look like a placeholder)
    if (!empty($thumbnail) && strpos($thumbnail, 'uploads/') === 0) {
        $filePath = __DIR__ . '/../' . $thumbnail;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // 3. Delete the database row
    $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);

    echo $stmt->execute()
        ? json_encode(["success" => true, "message" => "Blog and image deleted successfully"])
        : json_encode(["success" => false, "message" => "Failed to delete blog"]);
}

?>