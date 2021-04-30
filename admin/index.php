<?php
require '../app/core/adminautoloader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skylink Airlines</title>
    <meta name="description" content="Login page for admin to sign in">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">
</head>

<body>

    <div id="admin-index" class="bg-image shadow-2-strong">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form class="bg-white rounded shadow-5-strong p-5" action="login" method="POST" id="admin-login-form">
                            <div class="text-center">
                                <img src="../icons/form-logo.png" alt="" width="75%" height="75%" class="rounded">
                            </div>
                            <div class="form-group form-outline mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="col text-center">
                                <p class="login-error text-center" id="login-error">
                                    <?php if (isset($_SESSION['login-error'])) {
                                        echo $_SESSION['login-error'];
                                        unset($_SESSION['login-error']);
                                    } ?>
                                </p>
                            </div>

                            <button type="submit" id="login-submit" class="btn col-12 btn-primary">Sign In</button>
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
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../js/admin-login.js"></script>
</body>

</html>