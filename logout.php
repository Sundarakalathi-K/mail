<?php
session_start();
session_destroy();
echo $_SESSION['username'];
header("Location: login.php");
?>
