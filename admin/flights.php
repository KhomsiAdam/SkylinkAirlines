<?php
require '../app/core/adminautoloader.php';
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skylink Airlines</title>
        <meta name="description" content="View and Manage all Flights">
        <link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../icons/logo.png" alt="" width="75%" height="75%" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reservations">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users">Users</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown justify-content-end">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                + Add Flight
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Add new flight</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-xl-12 col-md-8">
                                        <form class="bg-white rounded shadow-5-strong p-5 needs-validation" action="createflight" method="POST" id="create-flight-form">

                                            <div class="form-group form-outline mb-4">
                                                <label for="flight-type" class="form-label">Flight Type</label>
                                                <select name="flight-type" id="flight-type" class="form-control">
                                                    <option value="" selected>
                                                        -- select an option --
                                                    </option>
                                                    <option value="One Way">One Way</option>
                                                    <option value="Round Trip">Round Trip</option>
                                                </select>
                                            </div>

                                            <div class="form-group form-outline mb-4">
                                                <label for="flight-origin" class="form-label">Flight Origin</label>
                                                <input type="text" name="flight-origin" id="flight-origin" class="form-control">
                                            </div>

                                            <div class="form-group form-outline mb-4">
                                                <label for="flight-destination" class="form-label">Flight Destination</label>
                                                <input type="text" name="flight-destination" id="flight-destination" class="form-control">
                                            </div>

                                            <div class="form-group form-outline mb-4">
                                                <label for="flight-departure-time" class="form-label">Flight Departure Time</label>
                                                <input type="datetime-local" name="flight-departure-time" id="flight-departure-time" class="form-control">
                                            </div>

                                            <div class="form-group form-outline mb-4" id="flight-return">
                                                <label for="flight-return-time" class="form-label">Flight Return Time</label>
                                                <input type="datetime-local" name="flight-return-time" id="flight-return-time" class="form-control">
                                            </div>

                                            <div class="form-group form-outline mb-4">
                                                <label for="flight-price" class="form-label">Price</label>
                                                <input type="number" name="flight-price" id="flight-price" class="form-control">
                                            </div>

                                            <div class="form-group form-outline mb-4">
                                                <label for="flight-seats" class="form-label">Seats</label>
                                                <input type="number" name="flight-seats" id="flight-seats" class="form-control">
                                            </div>

                                            <div class="col text-center">
                                                <p class="create-error" id="create-error">
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" form="create-flight-form" id="create-flight-submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $flights = new FlightView();
            $flights->showFlights();
            ?>
        </section>
        <footer>
            <div class="text-center p-3">
                © 2021 Copyright Skylink Airlines
            </div>
        </footer>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="../js/admin-flights.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index");
    exit();
}
?>