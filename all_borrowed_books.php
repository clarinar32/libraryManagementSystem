<?php
include 'db_connect.php';
$sql = "SELECT * FROM ALL_books_borrowed";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Borrowed Books</title>
    </style>
</head>
<body>

    <h2>All Borrowed Books</h2>

    <table>
        <tr>
            <th>Book ID</th>
            <th>Title</th><br>
            <th>Issue Date</th>
        </tr>

        <?php
        // Check if there are results
        if ($result->num_rows > 0) {
            //Display each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['book_id'] . "</td>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['issue_date'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No borrowed books found.</td></tr>";
        }
        ?>

    </table>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>