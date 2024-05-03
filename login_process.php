<?php
session_start();
include('db_config.php');

$username = $_POST['username'];
$password = $_POST['password'];

// Check if username and password match
$login_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($login_query);

if($result->num_rows == 1) {
    // Set session variables
    $_SESSION['username'] = $username;

    // Redirect to welcome page
    header("Location: welcome.php");
} else {
    echo "Invalid username or password.";
}
?>
