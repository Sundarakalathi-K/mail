<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
include('db_config.php');

$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

$check_query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($check_query);
// print_r( $result);

if ($result->num_rows > 0) {
    echo "Username already exists. <br>Please choose a different username.";
} else {
    $insert_query = "INSERT INTO users (id, username, email, mobile, password) VALUES ('','$username', '$email', '$mobile', '$password')";
    if ($conn->query($insert_query) === TRUE) {
        // echo $conn->query($insert_query);

        $mail = new PHPMailer(true);
        // print_r($mail);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'sundarakalathi1311@gmail.com';               // SMTP username
            $mail->Password   = 'rupr pkhs ylxz xkzh';                  // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('sundarakalathi1311@gmail.com', 'Sk');
            $mail->addAddress($email);                                  // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Hii !!! Registration Confirmation';
            $mail->Body    = "Please click the following link to create a password: <a href='http://localhost/mail/setpassword.php?username=" . "$username" . "'>Create Password</a>";
            $mail->AltBody = 'Please click the following link to create a password: http://localhost/mail/setpassword.php';

            $mail->send();
            echo "<br>Registration successful.<br> Please check your email for further instructions.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
