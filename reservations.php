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
        <meta name="description" content="List the reservations of the current logged in user">
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
                            <a class="nav-link" href="flights">Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Reservations</a>
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
            $reserv = new ReservView();
            $users_id = $_SESSION['users_id'];
            $reserv->showUserReservation($users_id);
            $passengers = new PassengerView();
            $reserv_id = 2;
            $passengers->showReservPassengers($reserv_id);
            ?>
        </section>
        <footer>
            <div class="text-center p-3">
                © 2021 Copyright Skylink Airlines
            </div>
        </footer>
        <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="js/user-reserv.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index");
    exit();
}
?>