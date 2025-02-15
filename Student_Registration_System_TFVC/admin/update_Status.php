<?php
require_once 'db_con.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Fetch current status
    $query = "SELECT status FROM users WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($db_con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['status'];

        // Toggle the status
        $newStatus = ($currentStatus === 'Active') ? 'Inactive' : 'Active';

        // Update the database
        $updateQuery = "UPDATE users SET status = '$newStatus' WHERE id = '$id'";
        if (mysqli_query($db_con, $updateQuery)) {
            echo json_encode(['success' => true, 'status' => $newStatus]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }
}
?>
