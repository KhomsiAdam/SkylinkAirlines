<?php
require '../app/core/adminautoloader.php';

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
        include "admin_head.php";
        ?>
        <meta name="description" content="Admin dashboard">
        <script src="../js/admin-dashboard.js" defer></script>
    </head>

    <body>
        <?php
        include "admin_navbar.php";
        ?>

        <div class="container">
            <?php echo 'Welcome' . ' ' . $_SESSION['admin_name'] ?>
        </div>

        <?php
        include "add_flight_modal.php";
        ?>

        <?php
        include "admin_footer.php";
        ?>
    </body>

    </html>
<?php
} else {
    header("Location: index");
    exit();
}
?>