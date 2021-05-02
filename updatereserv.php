<?php
require 'app/core/autoloader.php';

$reserv_obj = new ReservController();
$reserv_obj->updateReserv($users_id, $flight_id, $reserv_status);

$seats_obj = new FlightController();
$seats_obj->addSeat($flight_id);
header("Location: reservations");
?>