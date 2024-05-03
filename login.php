<html>
<head>
    <title>User Login</title>
    <style>
        .pad {
        padding: 50px;
        margin: 50px;
        text-align: center;
                    
        }
        h2{
            text-align: center;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <h2>User Login</h2>
    <div class="pad">

        <form method="post" action="login_process.php">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>
