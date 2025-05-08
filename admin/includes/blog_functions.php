<?php
include 'db.php';

function getAllBlogs($conn) {
    $stmt = $conn->prepare("SELECT * FROM blogs ORDER BY published_at DESC");
    $stmt->execute();
    return $stmt->get_result();
}

function getBlogById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addBlog($conn, $data) {
    $stmt = $conn->prepare("INSERT INTO blogs (title, author, slug, thumbnail, short_description, content, published_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $data['title'], $data['author'], $data['slug'], $data['thumbnail'], $data['short_description'], $data['content'], $data['published_at']);
    return $stmt->execute();
}

function updateBlog($conn, $data) {
    $stmt = $conn->prepare("UPDATE blogs SET title=?, author=?, slug=?, thumbnail=?, short_description=?, content=?, published_at=? WHERE id=?");
    $stmt->bind_param("sssssssi", $data['title'], $data['author'], $data['slug'], $data['thumbnail'], $data['short_description'], $data['content'], $data['published_at'], $data['id']);
    return $stmt->execute();
}

function deleteBlog($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
