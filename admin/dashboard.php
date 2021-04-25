<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hi there Admin!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
<?php
}else{
    header("Location: index.php");
    exit();
}
?>