<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';

$register_obj = new FlightController();
$register_obj->updateFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);

header("Location: dashboard.php");
?>