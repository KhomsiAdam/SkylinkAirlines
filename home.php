<?php
require 'app/core/autoloader.php';

if (isset($_SESSION['users_id']) && isset($_SESSION['users_email'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
        include "head.php";
        ?>
        <meta name="description" content="Homepage for users">
    </head>

    <body>
        <?php
        include "navbar.php";
        ?>
        <div id="user-home" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-xl-6 col-md-8">
                            <h1>The <span>sky</span> is the limit</h1>
                            <p>Where ever you wanna go, we've got you covered.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between col-md-3">
                        <a href="flights"><button type="button" class="btn btn-dark btn-lg">BOOK NOW</button></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </body>

    </html>
<?php
} else {
    header("Location: index");
    exit();
}
?>