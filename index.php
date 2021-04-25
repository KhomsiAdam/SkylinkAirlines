<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST" id="login-form">
        <h2>aircode user</h2>
        <input type="email" name="email" placeholder="Email" id="email"><br>
        <input type="password" name="password" placeholder="Password" id="password"><br>
            <p class="login-error" id="login-error">
                <?php if (isset($_SESSION['login-error'])) {
                    echo $_SESSION['login-error'];
                    unset($_SESSION['login-error']);
                }?>
            </p>
        <button type="submit" id="login-submit">SIGN IN</button>
    </form>
    <a href="signup.php">Sign Up</a>
    <script src="js/login.js"></script>
</body>
</html>