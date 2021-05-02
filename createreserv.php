<?php
require 'app/core/autoloader.php';

$flight_seats = $_POST['reserv_flight_seats'];

if ($flight_seats != 0) {
    $reserv_obj = new ReservController();
    $reserv_obj->createReserv($users_id, $flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_seats, $reserv_status);    
} else {
    $_SESSION['reserv-error'] = 'This flight has no available seats';
    header("Location: flights");
}
?>