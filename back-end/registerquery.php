<?php
include('../partial/connection.php');

// Pagination
$limit = 7;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $schoolID = mysqli_real_escape_string($conn, $_POST['SchoolID']);
    $accountName = mysqli_real_escape_string($conn, $_POST['AccountName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['LastName']);
    $department = mysqli_real_escape_string($conn, $_POST['Department']); 
    
    // check in account_validation
    $checkQuery1 = "SELECT student_id FROM account_validation WHERE student_id = '$schoolID'";
    $result1 = mysqli_query($conn, $checkQuery1);
    
    // check in valid_account table
    $checkQuery2 = "SELECT student_id FROM valid_account WHERE student_id = '$schoolID'";
    $result2 = mysqli_query($conn, $checkQuery2);
    
    if (mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
        header("Location: ../user/private/registration.php?error=exists");
    } else {
        // query
        $insertQuery = "INSERT INTO `account_validation` (`student_id`, `account_name`, `last_name`, `department`, `created_at`) 
                        VALUES ('$schoolID', '$accountName', '$lastName', '$department', NOW())";
        
        if (mysqli_query($conn, $insertQuery)) {
            header("Location: ../user/private/registration.php?success=true");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
