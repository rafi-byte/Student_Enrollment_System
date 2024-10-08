<?php
session_start();
require 'db.php';

// Function to send email notification
function sendNotification($email, $subject, $message) {
    $headers = 'From: no-reply@yourdomain.com' . "\r\n" .
               'Reply-To: no-reply@yourdomain.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // PHP mail function to send email
    if (mail($email, $subject, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}

// Example: Send notification when a student is enrolled
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $subject = "Enrollment Confirmation";
    $message = "Dear student, you have been successfully enrolled.";

    if (sendNotification($email, $subject, $message)) {
        echo "Notification sent successfully!";
    } else {
        echo "Failed to send notification.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notifications</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Send Email Notification</h1>
        <form action="notification.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Send Notification</button>
        </form>
    </div>
</body>
</html>
