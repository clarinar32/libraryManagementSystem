<?php
include 'db_connect.php';
$adm_no = "";
$result = null;

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $adm_no = $_POST["adm_no"]; // Get the entered admission number

    // Prepare and execute the stored procedure
    $stmt = $conn->prepare("CALL GET_BOOK_HISTORY(?)");
    $stmt->bind_param("i", $adm_no);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

    <!-- Form to enter Admission Number -->

    <?php if ($result && $result->num_rows > 0): ?>
        <?php echo htmlspecialchars($adm_no); ?>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($row['issue_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['due_date']); ?></td>
                    <td><?php echo $row['return_date'] ? htmlspecialchars($row['return_date']) : 'Not Returned'; ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                </tr>
            <?php endwhile; ?>

        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No history found for this admission number.</p>
    <?php endif; ?>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>












