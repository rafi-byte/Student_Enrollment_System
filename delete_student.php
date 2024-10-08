<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare
$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: view_students.php");
} else {
    echo "Error deleting record: " . $stmt->error;
}
?>