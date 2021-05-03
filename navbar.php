<script src="js/navbar.js" defer></script>

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
                    <a class="nav-link" href="reservations">Reservations</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown justify-content-end">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                        <?php echo $_SESSION['users_firstname'] . ' ' . $_SESSION['users_lastname'] ?>
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