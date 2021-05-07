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
    </head>

    <body>
        <?php
        include "admin_navbar.php";
        ?>

        <div id="admin-dashboard" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-xl-6 col-md-8">
                            <h1>The <span>sky</span> is the limit</h1>
                            <p>Welcome <?php echo $_SESSION['admin_name'] ?></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between col-md-4">
                        <a href="flights"><button type="button" class="btn btn-dark btn-lg">Manage Flights</button></a>
                        <a href="reservations"><button type="button" class="btn btn-dark btn-lg">Browse Bookings</button></a>
                    </div>
                </div>
            </div>
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