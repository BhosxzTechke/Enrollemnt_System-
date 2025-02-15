<?php
require_once 'db_con.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['grade'])) {
    $grade = $_POST['grade'];

    // Map the grade to its prefix
    $gradePrefix = match ($grade) {
        '1st' => 'G1',
        '2nd' => 'G2',
        '3rd' => 'G3',
        '4th' => 'G4',
        '5th' => 'G5',
        '6th' => 'G6',
        '7th' => 'G7',
        '8th' => 'G8',
        '9th' => 'G9',
        '10th' => 'G10',
        default => ''
    };

    if ($gradePrefix) {
        // Query to find the highest roll number for the selected grade prefix
        $query = "SELECT MAX(roll) AS maxRoll FROM student_info 
                  WHERE roll LIKE '2024-$gradePrefix-%'";
        $result = mysqli_query($db_con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $maxRoll = $row['maxRoll']; // e.g., 2024-G4-002

            if ($maxRoll) {
                // Extract the counter from the last roll number (after the last '-')
                $lastCounter = (int) substr($maxRoll, strrpos($maxRoll, '-') + 1);

                // Increment the counter for the next roll number
                $nextCounter = $lastCounter + 1;

                // Generate the next roll number with padding
                $rollNumber = "2024-$gradePrefix-" . str_pad($nextCounter, 3, '0', STR_PAD_LEFT);
            } else {
                // If no record exists for this grade, start with 001
                $rollNumber = "2024-$gradePrefix-001";
            }
        } else {
            // If no records are found, start with 001
            $rollNumber = "2024-$gradePrefix-001";
        }

        echo $rollNumber; // Send the generated roll number back to the client
    } else {
        echo 'Invalid grade selected.';
    }
}
?>
