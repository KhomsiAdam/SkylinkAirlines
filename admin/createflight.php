<?php
require '../app/core/adminautoloader.php';

$flight_obj = new FlightController();
$flight_obj->createFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);
header("Location: flights");