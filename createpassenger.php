<?php
require 'app/core/autoloader.php';
// $test_obj = new PassengerModel();
// $test_obj->test();

$flight_seats = $_POST['passengers_available_flight_seats'];
$flight_passengers_seats = $_POST['passengers_reserved_flight_seats'];

$passenger_obj = new PassengerController();
$passenger_obj->addPassenger($flight_passengers_seats);

$seats_obj = new FlightController();
$seats_obj->removePassengerSeats($flight_id, $flight_seats, $flight_passengers_seats); 
?>