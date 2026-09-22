<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $adm_no = $_POST['adm_no']; // Student Admission Number
    $book_id = $_POST['book_id']; // Book ID
    $borrow_date = $_POST['issue_date']; // Date of Borrowing

    // Insert the borrowing record into the database
    $sql = "INSERT INTO borrowing_form (adm_no, book_id, issue_date) VALUES ('$adm_no', '$book_id', '$issue_date')";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Book borrowed successfully!";
    } 
    else 
    {
        echo "Error: " . $conn->error;
    }
}

//Close the database connection
$conn->close();
?>