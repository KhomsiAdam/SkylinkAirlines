<?php
require '../app/core/adminautoloader.php';
/* 
$host = "localhost";
$user = "root";
$pwd = "";
$db_name = "skylink_db";

$dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;
$conn = new PDO($dsn, $user, $pwd);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$admin_name = 'admin';
$admin_password = password_hash('admin123**', PASSWORD_BCRYPT);

$sql = "INSERT INTO admins (admin_name, admin_password)
VALUES ('$admin_name', '$admin_password')";
$conn->query($sql); */
header("Location: index");
?>