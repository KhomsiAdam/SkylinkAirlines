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
        <meta name="description" content="Admin dashboard">
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
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="flights">Flights</a>
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
                </div>
            </div>
        </nav>

        <div class="container">
            <?php echo 'Welcome' . ' ' . $_SESSION['admin_name'] ?>
        </div>

        <footer>
            <div class="text-center p-3">
                © 2021 Copyright Skylink Airlines
            </div>
        </footer>

        
    </body>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../js/admin-dashboard.js"></script>
    </html>
<?php
} else {
    header("Location: index");
    exit();
}
?>