<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';

$reserv_obj = new ReservController();
$reserv_obj->updateReserv($reserv_id, $reserv_status);

header("Location: dashboard.php");
?>