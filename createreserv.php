<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';
$users_id = $_POST['users_id'];
$flight_id = $_POST['flight_id'];
$reserv_status = $_POST['reserv_status'];

$reserv_obj = new ReservController();
$reserv_obj->createReserv($users_id, $flight_id, $reserv_status);

header("Location: dashboard.php");
?>