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
        <meta name="description" content="View and Manage all Flights">
        <script src="../js/admin-flights.js" defer></script>
    </head>

    <body>
        <?php
        include "admin_navbar.php";
        ?>
        <?php
        include "admin_flights_searchbar.php";
        ?>
        <section>
            <?php
            include "add_flight_modal.php";
            ?>

            <?php
            $flights = new FlightView();
            $flights->showFlights();
            ?>
        </section>
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