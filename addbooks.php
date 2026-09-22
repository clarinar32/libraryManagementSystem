<?php
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get book data from the form
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    // Insert data into the database
    $sql = "INSERT INTO books (book_id, title, author, category) VALUES ('$book_id', '$title', '$author', '$category')";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Book added successfully!";
    } 
    else 
    {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
