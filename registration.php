<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get data from the form
    $adm_no = $_POST['adm_no']; 
    $student_name = $_POST['student_name'];
    $class = $_POST['class'];

    //Insert data into the database
    $sql = "INSERT INTO registration_form (adm_no, student_name, class) VALUES ('$adm_no', '$student_name', '$class')";

    if ($conn->query($sql) === TRUE) {
        echo "Student registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>