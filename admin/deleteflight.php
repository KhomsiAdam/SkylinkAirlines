<?php
require '../app/core/adminautoloader.php';

$register_obj = new FlightController();
$register_obj->deleteFlights($flight_id);

header("Location: flights");
?>