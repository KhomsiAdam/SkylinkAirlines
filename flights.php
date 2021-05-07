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
        <div id="reserv-alert">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-warning d-flex align-items-center justify-content-center m-3" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <b class="reserv-error text-center" id="reserv-error">
                    <?php if (isset($_SESSION['reserv-error'])) {
                        echo $_SESSION['reserv-error'];
                        unset($_SESSION['reserv-error']);
                    } ?>
                </b>
            </div>
        </div>

        <section>
            <?php
            $flights = new FlightView();
            $flights->showUserFlights();
            ?>
            <div class="modal fade" id="reservModal" tabindex="-1" aria-labelledby="reservModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reservModalLabel">Flight Booking</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <form action="createreserv" class="reserv-form" id="reserv-form" method="POST">
                                <input type="text" id="reserv_user_id" name="reserv_user_id" readonly value="<?php echo $_SESSION['users_id']; ?>" hidden>
                                <input type="text" id="reserv_flight_id" name="reserv_flight_id" readonly hidden>
                                <input type="text" id="flight_type" name="flight_type" readonly hidden>
                                <input type="text" id="flight_origin" name="flight_origin" readonly hidden>
                                <input type="text" id="flight_destination" name="flight_destination" readonly hidden>
                                <input type="text" id="flight_departure_time" name="flight_departure_time" readonly hidden>
                                <input type="text" id="flight_return_time" name="flight_return_time" readonly hidden>
                                <input type="text" id="reserv_flight_seats" name="reserv_flight_seats" readonly hidden>
                                <input type="text" id="reserv_status" name="reserv_status" readonly hidden value="Confirmed">
                            </form>
                            Are you sure you wanna book this flight ?
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-danger col-sm-5" data-bs-dismiss="modal">No</button>
                            <button type="submit" form="reserv-form" class="btn btn-outline-primary col-sm-5">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
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