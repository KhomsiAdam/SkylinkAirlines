<?php
class FlightController extends FlightModel {
    // Create flight in the table
    public function createFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        $this->setFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);
    }
    // Update flight in the table
    public function updateFlights() {
        $flight_id = $_POST['flight_id'];
        $flight_type = $_POST['flight_type'];
        $flight_origin = $_POST['flight_origin'];
        $flight_destination = $_POST['flight_destination'];
        $flight_departure_time = $_POST['flight_departure_time'];
        $flight_return_time = $_POST['flight_return_time'];
        $flight_price = $_POST['flight_price'];
        $flight_seats = $_POST['flight_seats'];
        $this->modFlights($flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);
    }
    // Delete flight from the table
    public function deleteFlights() {
        $flight_id = $_POST['flight_id'];
        $this->delFlights($flight_id);
    }
}
?>