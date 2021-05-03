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
    <script src="../js/admin-404.js" defer></script>
</head>

<body>
    <?php
    include "admin_navbar.php";
    ?>
    <?php
    include "add_flight_modal.php";
    ?>
    404 Error - Page Not Found!
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