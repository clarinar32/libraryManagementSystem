<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get book ID from the form
    $book_id = $_POST['book_id']; 

    // Delete book from the database
    $sql = "DELETE FROM books WHERE book_id = '$book_id'";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Book record deleted successfully!";
    } else 
    {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
