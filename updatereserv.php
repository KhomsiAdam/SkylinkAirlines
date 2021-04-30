<?php
require 'app/core/autoloader.php';

$reserv_obj = new ReservController();
$reserv_obj->updateReserv($reserv_id, $reserv_status);

header("Location: reservations");
?>