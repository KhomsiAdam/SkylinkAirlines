<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';

$reserv_obj = new ReservController();
$reserv_obj->deleteReserv($reserv_id);

header("Location: dashboard.php");
?>