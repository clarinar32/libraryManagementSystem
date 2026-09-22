<?php
// Include database connection
include 'db_connect.php';

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $username = $_POST['username']; // Retrieve the username from the form
    $email = $_POST['email']; // Retrieve the email from the form
    $user_password = $_POST['user_password']; // Retrieve the password from the form
    $confirm_password = $_POST['confirm_password']; // Retrieve the confirm password field
    $user_role = $_POST['user_role']; // Retrieve the user role from the form

    // Check if passwords match
    if ($user_password !== $confirm_password) {
        die("Passwords do not match!"); // Stop execution if passwords do not match
    }

    // Prepare SQL statement to insert user data into the database (password is not hashed, which is NOT SECURE)
    $sql = "INSERT INTO users (username, email, user_password, user_role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql); // Prepare the SQL query
    $stmt->bind_param("ssss", $username, $email, $user_password, $user_role); // Bind the parameters to the query
    
    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "Registration successful!"; // Display success message
    } else {
        echo "Error: " . $conn->error; // Display error message if something goes wrong
    }
    
    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
