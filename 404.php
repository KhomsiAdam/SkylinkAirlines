<?php
require 'app/core/adminautoloader.php';
if (isset($_SESSION['users_id']) && isset($_SESSION['users_email'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.php";
    ?>
    <meta name="description" content="Error 404 page for Users">
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    404 Error - Page Not Found!
    <?php
    include "footer.php";
    ?>
</body>

</html>
<?php
} else {
    header("Location: index");
    exit();
}?>