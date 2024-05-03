<?php

include('db_config.php');

?>
<html>

<head>
    <title>User Registration</title>
    <style>
        .pad {
            padding: 50px;
            margin: 50px;
            text-align: center;

        }

        h2 {
            text-align: center;
            padding-top: 20px;
        }

        .error-message {
            color: red;
            font-size: medium;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h2>User Registration</h2>
    <div class="pad">
        <form method="post" action="./check_username.php">
            <input type="text" id="username" placeholder="Username" name="username"><br>
            <div id="username-check"></div>

            <script>
                $(document).ready(function() {
                    $('#username').keyup(function() {
                        var username = $(this).val();
                        if (username != '') {
                            $.ajax({
                                url: 'check_username.php',
                                type: 'post',
                                data: {
                                    username: username
                                },
                                success: function(response) {
                                    $('#username-check').html(response);
                                }
                            });
                        } else {
                            $('#username-check').html('');
                        }
                    });
                });
            </script>
        </form>
        <form method="post" action="register_process.php">
            <!-- <input type="text" id="username" name="username"><br> -->
            <input type="text" id="reenter-username" name="username" placeholder="Re-Enter Username" required><br>
            <span class="error-message" id="username-match-error"></span><br><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="text" name="mobile" placeholder="Mobile" required pattern="[1-9]{1}[0-9]{9}"><br><br>
            <input type="submit" name="submit" value="Submit">
    </div>
    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                var username = $('#username').val();
                var reenterUsername = $('#reenter-username').val();

                if (username !== reenterUsername) {
                    $('#username-match-error').text('Usernames do not match');
                    e.preventDefault(); // Prevent form submission
                } else {
                    $('#username-match-error').text(''); // Clear error message if matched
                }
            });
        });
    </script>
    </form>
</body>

</html>