<?php
include 'db_connect.php';
//Fetch book status data
$sql = "SELECT * FROM book_status";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Status</title>
</head>
<body>

    <h2>Book Status List</h2>

    <table>
        <tr>
            <th>Admission Number</th>
            <th>Book ID</th>
            <th>Issue Date</th>
            <th>Due Date</th>
            <th>Status</th>
        </tr>

        <?php
        //Check if there are results
        if ($result->num_rows > 0) 
        {
            // Display each row
            while ($row = $result->fetch_assoc()) 
            {
                echo "<tr>
                        <td>" . $row['adm_no'] . "</td>
                        <td>" . $row['book_id'] . "</td>
                        <td>" . $row['issue_date'] . "</td>
                        <td>" . $row['due_date'] . "</td>
                        <td>" . $row['status'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found.</td></tr>";
        }
        ?>

    </table>

</body>
</html>

<?php
//Close the database connection
$conn->close();
?>
