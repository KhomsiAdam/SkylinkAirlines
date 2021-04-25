<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';
$flight_type = $_POST['flight_type'];
$flight_origin = $_POST['flight_origin'];
$flight_destination = $_POST['flight_destination'];
$flight_departure_time = $_POST['flight_departure_time'];
$flight_return_time = $_POST['flight_return_time'];
$flight_price = $_POST['flight_price'];
$flight_seats = $_POST['flight_seats'];

$flight_obj = new FlightController();
$flight_obj->createFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);

header("Location: dashboard.php");
?>