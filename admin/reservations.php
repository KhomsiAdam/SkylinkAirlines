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
        <meta name="description" content="List of all reservations done by users">
    </head>

    <body>
        <?php
        include "admin_navbar.php";
        ?>
        <?php
        include "admin_reserv_searchbar.php";
        ?>
        <section>
            <?php
            include "add_flight_modal.php";
            ?>

            <?php
            $reservs = new ReservView();
            $reservs->showReservations();
            $passengers = new PassengerView();
            $passengers->showPassengers();
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