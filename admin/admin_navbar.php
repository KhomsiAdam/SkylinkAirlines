<script src="../js/navbar.js" defer></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-center text-center">
        <a class="navbar-brand col-md-2" href="dashboard">
            <img src="../icons/logo_horizontal.png" alt="Skylink Airlines Logo with text horizontally" width="75%" height="75%" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-md-8" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">Dashboard</a>
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
            <!-- Button trigger for add flight modal -->
            <button type="button" class="btn btn-outline-primary col-md-2" data-bs-toggle="modal" data-bs-target="#addModal">
                + Add Flight
            </button>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown justify-content-end">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                        <?php echo $_SESSION['admin_name']?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        <!-- <li><hr class="dropdown-divider"></li> -->
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>