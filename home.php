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

        <div class="container">
            <?php echo 'Welcome' . ' ' . $_SESSION['users_firstname'] . ' ' . $_SESSION['users_lastname'] ?>
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