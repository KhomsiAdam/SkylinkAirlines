<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';

$register_obj = new FlightController();
$register_obj->deleteFlights($flight_id);

header("Location: dashboard.php");
?>