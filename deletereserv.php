<?php
require 'app/core/autoloader.php';

$reserv_obj = new ReservController();
$reserv_obj->deleteReserv($reserv_id);

header("Location: reservations");