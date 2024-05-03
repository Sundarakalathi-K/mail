<?php
session_start();
include('db_config.php');
// print_r($_POST);
// print_r($_GET);
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password != $confirm_password) {
    echo "Passwords do not match.";
} else {
    // Update user's password in database
    $update_query = "UPDATE users SET password='$password' WHERE username='$username'";
    if($conn->query($update_query) === TRUE) {
        echo "Password set successfully.";
    } else {
        echo "Error: " . $update_query . "<br>" . $conn->error;
    }
}
header("Location: login.php");
?>
