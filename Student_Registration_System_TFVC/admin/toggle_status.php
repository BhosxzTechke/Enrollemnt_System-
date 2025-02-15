<?php
include 'db_con.php'; // Include your database connection script

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $query = mysqli_query($db_con, "SELECT status FROM student_info WHERE id = $id");
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        $currentStatus = $result['status'];
        $newStatus = ($currentStatus === 'pending') ? 'approved' : 'pending';

        $updateQuery = mysqli_query($db_con, "UPDATE student_info SET status = '$newStatus' WHERE id = $id");

        if ($updateQuery) {
            echo json_encode(['success' => true, 'status' => $newStatus]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status in the database.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Record not found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
