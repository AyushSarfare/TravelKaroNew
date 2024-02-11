<?php
session_start();
include '../connection.php'; // Include the connection.php file here

// Retrieve user input from login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to retrieve user credentials from the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // User found, compare passwords
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if ($password == $storedPassword) {
            // User is authenticated, store username in a session variable
            $_SESSION['username'] = $username;

            // Redirect to another page after displaying the message
            header("refresh:4;url=./dash.php"); // Redirect after 3 seconds
            echo "<p class='success'>LOGIN SUCCESSFULL!
            
            <br> Welcome, ". $_SESSION['username'] . "<p class='success'> You will be redirected to the dashboard shortly.</p> ";

        } else {
            // Invalid password, show an error message
            header("refresh:2;url=./login.php"); 
            echo "<p class='error'>Invalid username or password.</p>";
        }
    } else {
        // User not found, show an error message
        header("refresh:2;url=./login.php"); 
        echo "<p class='info'>User Not Found</p>";
    }
}
   $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    color: #343a40;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #007bff;
}

p {
    text-align: center;
    margin-top: 20px;
}

.success {
    color: #28a745;
}

.error {
    color: #dc3545;
}

.info {
    color: #007bff;
}

    </style>
</head>
<body>
    
</body>
</html>