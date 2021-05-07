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
    <meta name="description" content="Error 404 page for Admin">
</head>

<body>
    <?php
    include "admin_navbar.php";
    ?>
    <?php
    include "add_flight_modal.php";
    ?>
    <div id="admin-error" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <h1 class="mb-4">The <span>Moon</span> is the<br>actual limit</h1>
                            <p class="error mb-2">Error 404 - The page you are<br>requesting doesn't exist.</p>
                            <p class="moon mb-4">Planes can't reach the moon yet...</p>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-between flex-column">
                            <p class="browse mb-4 text-center">Maybe you want to manage the current available flights.</p>
                            <a href="flights"><button type="button" class="btn btn-dark btn-lg col-12 mb-4">Check Flights</button></a>
                            <p class="check mb-4 text-center">Or browse reservations</p>
                            <a href="reservations"><button type="button" class="btn btn-dark btn-lg col-12">Browse Bookings</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    include "admin_footer.php";
    ?>
</body>

</html>
<?php
} else {
    header("Location: index");
    exit();
}?>