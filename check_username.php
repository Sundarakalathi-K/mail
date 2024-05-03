<?php
include('db_config.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo "Username already exists.";
    } else {
        echo "Username is available.";
    }
}
?>
