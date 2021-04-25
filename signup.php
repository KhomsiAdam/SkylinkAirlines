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
    <form action="register.php" method="POST" id="register-form">
        <h2>aircode</h2>
        <input type="text" name="firstname" placeholder="Firstname" id="firstname"><br>
        <input type="text" name="lastname" placeholder="Lastname" id="lastname"><br>
        <input type="email" name="email" placeholder="Email" id="email"><br>
        <input type="password" name="password" placeholder="Password" id="password"><br>
        <input type="date" name="dob" placeholder="Date of birth" id="dob"><br>
        <input type="text" name="country" placeholder="Country" id="country"><br>
        <p class="register-error" id="register-error">
            <?php if (isset($_SESSION['register-error'])) {
                echo $_SESSION['register-error'];
                unset($_SESSION['register-error']);
            }?>
        </p>
        <button type="submit" id="register-submit">SIGN UP</button>
    </form>
    <a href="index.php">Sign In</a>
    <script src="js/register.js"></script>
</body>
</html>