<?php
class FlightController extends FlightModel {
    // Create flight in the table
    public function createFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        $flight_type = $_POST['flight-type'];
        $flight_origin = $_POST['flight-origin'];
        $flight_destination = $_POST['flight-destination'];

        $flight_departure = $_POST['flight-departure-time'];
        $flight_return = $_POST['flight-return-time'];

        $flight_departure_time = date("Y-m-d H:i:s", strtotime($flight_departure));
        $flight_return_time = date("Y-m-d H:i:s", strtotime($flight_return));

        $flight_price = $_POST['flight-price'];
        $flight_seats = $_POST['flight-seats'];
        $this->setFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);
    }
    // Update flight in the table
    public function updateFlights($flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        $flight_id = $_POST['edit_flight_id'];

        $flight_type = $_POST['edit-flight-type'];
        $flight_origin = $_POST['edit-flight-origin'];
        $flight_destination = $_POST['edit-flight-destination'];

        $flight_departure_time = date("Y-m-d H:i:s", strtotime($_POST['edit-flight-departure-time']));
        $flight_return_time = date("Y-m-d H:i:s", strtotime($_POST['edit-flight-return-time']));
        
        $flight_price = $_POST['edit-flight-price'];
        $flight_seats = $_POST['edit-flight-seats'];
        $this->modFlights($flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);
    }
    // Delete flight from the table
    public function deleteFlights() {
        $flight_id = $_POST['delete_flight_id'];
        $this->delFlights($flight_id);
    }
}
?>