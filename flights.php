<?php
require 'app/core/autoloader.php';
if (isset($_SESSION['users_id']) && isset($_SESSION['users_email'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skylink Airlines</title>
        <meta name="description" content="List of all flights available">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="icons/logo.png" alt="" width="75%" height="75%" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reservations">Reservations</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown justify-content-end">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            <?php echo $_SESSION['users_firstname'] . ' ' . $_SESSION['users_lastname']?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout">Logout</a></li>
                                <!-- <li><hr class="dropdown-divider"></li> -->
                            </ul>
                        </li>

                    </ul>

                    <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                </div>
            </div>
        </nav>
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
                                <input type="text" id="reserv_user_id" name="reserv_user_id" readonly value="<?php echo $_SESSION['users_id']; ?>">
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
        <footer>
            <div class="text-center p-3">
                © 2021 Copyright Skylink Airlines
            </div>
        </footer>
        <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="js/user-flights.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index");
    exit();
}
?>