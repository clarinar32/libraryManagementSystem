<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM sign_up WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if password matches 
        if ($password === $user['user_password']) 
        {
            echo "Login successful!";
            // Redirect user based on role
            if ($user['user_role'] === 'admin') 
            {
                header("Location: admin_page.html");
            } else 
            {
                header("Location: student_page.html");
            }
            exit();
        } else 
        {
            echo "Incorrect password!";
        }
    } else 
    {
        echo "User not found!";
    }
}

// Close the database connection
$conn->close();
?>
