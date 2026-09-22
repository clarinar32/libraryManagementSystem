<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get data from the form
    $adm_no = $_POST['adm_no']; 
    $student_name = $_POST['student_name'];
    $class = $_POST['class'];

    //Insert data into the database
    $sql = "UPDATE registration_form SET adm_no = '$adm_no', student_name = '$student_name', class = '$class' WHERE adm_no = '$adm_no'";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Student Update successfull!";
    } else 
    {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>