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
        <meta name="description" content="List the reservations of the current logged in user">
        <script src="js/user-reserv.js" defer></script>
    </head>

    <body>
        <?php
        include "navbar.php";
        ?>
        <?php
        include "reserv_searchbar.php";
        ?>
        <section>
            <?php
            $reserv = new ReservView();
            $users_id = $_SESSION['users_id'];
            $reserv->showUserReservation($users_id);
            $passengers = new PassengerView();
            $reserv_id = 2;
            $passengers->showReservPassengers($reserv_id);
            ?>
        </section>
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