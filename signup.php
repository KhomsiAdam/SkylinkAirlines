<?php
require 'app/core/autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skylink Airlines</title>
    <meta name="description" content="Register page for users to sign up">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
</head>

<body>
    <div id="user-signup" class="bg-image shadow-2-strong" style="background-image: url(images/index_bg.jpg);">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form class="bg-white rounded shadow-5-strong p-5" action="register" method="POST" id="register-form">
                            <div class="text-center">
                                <img src="icons/form-logo.png" alt="" width="75%" height="75%" class="rounded">
                            </div>    
                            <div class="form-group form-outline mb-1">
                                <label for="firstname" class="form-label">FirstName</label>
                                <input type="text" name="firstname" id="firstname" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-1">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-1">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-1">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-1">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-1">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" id="country" class="form-control">
                            </div>
                            <div class="col text-center">
                                <p class="register-error" id="register-error">
                                    <?php if (isset($_SESSION['register-error'])) {
                                        echo $_SESSION['register-error'];
                                        unset($_SESSION['register-error']);
                                    } ?>
                                </p>
                            </div>
                            <button type="submit" id="register-submit" class="btn col-12 btn-primary mb-1">Sign Up</button>
                            <div class="col text-center">
                                <a href="index">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="text-center p-3">
            © 2021 Copyright Skylink Airlines
        </div>
    </footer>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/user-register.js"></script>
</body>

</html>