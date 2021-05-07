<?php
require '../app/core/adminautoloader.php';

$register_obj = new FlightController();
$register_obj->deleteFlights();

header("Location: flights");