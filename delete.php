<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get admission number from the form
    $adm_no = $_POST['adm_no']; 

    // Delete query
    $sql = "DELETE FROM registration_form WHERE adm_no = '$adm_no'";
    $sql = "DELETE FROM borrowing_form WHERE adm_no = '$adm_no'";
    $sql = "DELETE FROM returning_form  WHERE adm_no = '$adm_no'";

    if ($conn->query($sql) === TRUE) {
        echo "Student record deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
