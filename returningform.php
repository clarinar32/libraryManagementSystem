<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $adm_no = $_POST['adm_no'];
    $book_id = $_POST['book_id'];
    $return_date = $_POST['return_date'];

    //Insert the return record into the database
    $sql = "INSERT INTO returned_books (adm_no, book_id, return_date) VALUES ('$adm_no', '$book_id', '$return_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Book returned successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


















