<!-- <html>

<head>
    <title>Set Password</title>
    <style>
        .pad {
            padding: 50px;
            margin: 50px;
            text-align: center;

        }

        h2 {
            text-align: center;
            padding-top: 30px;
        }
    </style>
</head>

<body>
    <br><h2>Set Password</h2>
    <div class="pad">

        <form method="post" action="setpassword_process.php">
            <input type="hidden" name="username" value='<?php echo $_GET['username'] ?>'>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
            <input type="submit" name="submit" value="Set Password">
        </form>
    </div>
</body>

</html> -->

<!DOCTYPE html>
<html>

<head>
    <title>Set Password</title>
    <style>
        .pad {
            padding: 50px;
            margin: 50px;
            text-align: center;
        }

        h2 {
            text-align: center;
            padding-top: 30px;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Set Password</h2>
    <div class="pad">
        <form id="password-form" method="post" action="setpassword_process.php">
            <!-- <form id="password-form" method="post" action="setpassword_process.php"> -->
            <input type="hidden" name="username" value='<?php echo $_GET['username'] ?>'>
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <span class="error-message" id="password-error"></span><br><br>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required><br><br>
            <span class="error-message" id="confirm-password-error"></span><br><br>
            <input type="submit" name="submit" value="Set Password">
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#password-form').submit(function(e) {
                e.preventDefault(); // Prevent form submission
                var password = $('#password').val();
                var confirmPassword = $('#confirm-password').val();

                // Validating password
                var passwordError = '';
                if (password.length < 8) {
                    passwordError = 'Password must be at least 8 characters long.';
                } else if (!/[A-Z]/.test(password)) {
                    passwordError = 'Password must contain at least one uppercase letter.';
                } else if (!/[a-z]/.test(password)) {
                    passwordError = 'Password must contain at least one lowercase letter.';
                } else if (!/\d/.test(password)) {
                    passwordError = 'Password must contain at least one digit.';
                } else if (!/[\W_]/.test(password)) {
                    passwordError = 'Password must contain at least one special character.';
                }

                $('#password-error').text(passwordError);

                // Validating confirm password
                var confirmPasswordError = '';
                if (confirmPassword !== password) {
                    confirmPasswordError = 'Passwords do not match.';
                }

                $('#confirm-password-error').text(confirmPasswordError);

                // If no errors, submit the form
                if (passwordError === '' && confirmPasswordError === '') {
                    // Uncomment the below line to submit the form
                    $('#password-form').off('submit').submit();
                }
            });
        });
    </script>
</body>

</html>