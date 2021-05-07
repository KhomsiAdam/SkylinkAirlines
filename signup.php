<?php
require 'app/core/autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.php";
    ?>
    <meta name="description" content="Register page for users to sign up">
    <script src="js/user-register.js" defer></script>
</head>

<body>
    <div id="user-signup" class="bg-image shadow-2-strong" style="background-image: url(images/index_bg.jpg);">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8 mt-5">
                        <form class="bg-white rounded shadow-5-strong pt-4 pb-2 px-5" action="register" method="POST" id="register-form">
                            <div class="text-center mb-3">
                                <img src="icons/logo_vertical.png" alt="Skylink Airlines vertical logo above text" width="50%" height="50%" class="rounded">
                            </div>
                            <div class="form-group form-outline mb-2">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" name="firstname" id="firstname" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-2">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group form-outline mb-2">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" min="2013-01-01">
                            </div>
                            <div class="form-group form-outline mb-2">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" id="country" class="form-control">
                            </div>
                            <div class="col text-center mt-4">
                                <p class="register-error" id="register-error">
                                    <?php if (isset($_SESSION['register-error'])) {
                                        echo $_SESSION['register-error'];
                                        unset($_SESSION['register-error']);
                                    } ?>
                                </p>
                            </div>
                            <button type="submit" id="register-submit" class="btn col-12 btn-dark mt-2">Sign Up</button>
                            <div class="col text-center pt-3">
                            <p>Already have an account ? <a href="index">Sign In</a></p>
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