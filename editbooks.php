<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get book data from the form
    $book_id = $_POST['book_id']; 
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    // Update book details in the database
    $sql = "UPDATE books SET title = '$title', author = '$author', category = '$category' WHERE book_id = '$book_id'";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Book updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
