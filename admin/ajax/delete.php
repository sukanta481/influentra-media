<?php
include '../db.php';

$id = $_POST['id'] ?? null;

if ($id && is_numeric($id)) {
    $conn->query("DELETE FROM students WHERE id = $id");
    echo "Student deleted!";
} else {
    echo "Invalid ID.";
}
?>
