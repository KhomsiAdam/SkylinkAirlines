<?php
require 'app/core/autoloader.php';

$reserv_obj = new ReservController();
$reserv_obj->createReserv($users_id, $flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $reserv_status);
?>