<?php
require 'app/core/autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.php";
    ?>
    <meta name="description" content="Login page for users to sign in">
    <script src="js/user-login.js" defer></script>
</head>

<body>
    <div id="user-index" class="bg-image shadow-2-strong">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form class="bg-white rounded shadow-5-strong pt-4 pb-2 px-5" action="login" method="POST" id="login-form">
                            <div class="text-center mb-3">
                                <img src="icons/logo_vertical.png" alt="Skylink Airlines vertical logo above text" width="50%" height="50%" class="rounded">
                            </div>
                            <div class="form-group form-outline mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
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
                            <button type="submit" id="login-submit" class="btn col-12 btn-dark mb-3">Sign In</button>
                            <div class="col text-center">
                                <p>Not having an account ? <a href="signup">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>