<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require 'db.php';

// Retrieve admin activity logs
$logs = $conn->query("SELECT * FROM activity_log ORDER BY timestamp DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Activity Logs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Activity Logs</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Admin ID</th>
                <th>Activity</th>
                <th>Timestamp</th>
            </tr>

            <?php
            if ($logs->num_rows > 0) {
                while ($log = $logs->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $log['id'] . "</td>";
                    echo "<td>" . $log['admin_id'] . "</td>";
                    echo "<td>" . $log['activity'] . "</td>";
                    echo "<td>" . $log['timestamp'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No logs available</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
