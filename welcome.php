<?php
session_start();
if(isset($_SESSION['username'])) {
    echo "<br>Welcome, ".$_SESSION['username']."!";
    echo "<a href='logout.php'><br><br>Logout</a>";
} else {
    header("Location: login.php");
}
?>
