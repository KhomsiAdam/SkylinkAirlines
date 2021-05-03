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
    <meta name="description" content="List of all flights available">
    <script src="js/user-flights.js" defer></script>
</head>

<body>

    <?php
        include "navbar.php";
    ?>
    <?php
        include "flights_searchbar.php";
    ?>

    <section>
        <?php
            $flights = new FlightView();
            $flights->showUserFlights();
            ?>
        <div class="modal fade" id="reservModal" tabindex="-1" aria-labelledby="reservModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reservModalLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="createreserv" class="reserv-form" id="reserv-form" method="POST">
                            <input type="text" id="reserv_user_id" name="reserv_user_id" readonly
                                value="<?php echo $_SESSION['users_id']; ?>">
                            <input type="text" id="reserv_flight_id" name="reserv_flight_id" readonly>
                            <input type="text" id="flight_type" name="flight_type" readonly>
                            <input type="text" id="flight_origin" name="flight_origin" readonly>
                            <input type="text" id="flight_destination" name="flight_destination" readonly>
                            <input type="text" id="flight_departure_time" name="flight_departure_time" readonly>
                            <input type="text" id="flight_return_time" name="flight_return_time" readonly>
                            <input type="text" id="reserv_flight_seats" name="reserv_flight_seats" readonly>
                            <input type="text" id="reserv_status" name="reserv_status" readonly value="Confirmed">
                        </form>
                        Are you sure you wanna book this flight ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="reserv-form" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col text-center">
        <p class="reserv-error text-center" id="reserv-error">
            <?php if (isset($_SESSION['reserv-error'])) {
                    echo $_SESSION['reserv-error'];
                    unset($_SESSION['reserv-error']);
                } ?>
        </p>
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