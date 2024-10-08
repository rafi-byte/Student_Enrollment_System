<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require 'db.php';

// Fetch student count
$student_count = $conn->query("SELECT COUNT(*) AS total FROM students")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="dashboard-stats">
            <p>Total Enrolled Students: <?php echo $student_count; ?></p>
        </div>
        <div class="admin-actions">
            <a href="enroll.php">Enroll New Student</a> |
            <a href="view_students.php">View Students</a> |
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
