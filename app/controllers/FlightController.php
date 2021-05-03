<?php
class FlightController extends FlightModel {
    // Create flight in the table
    public function createFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        function validateFlightCreation($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $flight_type = validateFlightCreation($_POST['flight-type']);
        $flight_origin = validateFlightCreation($_POST['flight-origin']);
        $flight_destination = validateFlightCreation($_POST['flight-destination']);

        $flight_departure = validateFlightCreation($_POST['flight-departure-time']);
        $flight_return = validateFlightCreation($_POST['flight-return-time']);

        $flight_departure_time = validateFlightCreation(date("Y-m-d H:i:s", strtotime($flight_departure)));
        $flight_return_time = validateFlightCreation(date("Y-m-d H:i:s", strtotime($flight_return)));

        $flight_price = validateFlightCreation($_POST['flight-price']);
        $flight_seats = validateFlightCreation($_POST['flight-seats']);
        $this->setFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);
    }
    // Update flight in the table
    public function updateFlights($flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        function validateFlightEdit($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $flight_id = $_POST['edit_flight_id'];

        $flight_type = validateFlightEdit($_POST['edit-flight-type']);
        $flight_origin = validateFlightEdit($_POST['edit-flight-origin']);
        $flight_destination = validateFlightEdit($_POST['edit-flight-destination']);

        $flight_departure_time = validateFlightEdit(date("Y-m-d H:i:s", strtotime($_POST['edit-flight-departure-time'])));
        $flight_return_time = validateFlightEdit(date("Y-m-d H:i:s", strtotime($_POST['edit-flight-return-time'])));
        
        $flight_price = validateFlightEdit($_POST['edit-flight-price']);
        $flight_seats = validateFlightEdit($_POST['edit-flight-seats']);
        $this->modFlights($flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats);
    }
    // Substract one seat from seats
    public function removeSeat($flight_id, $flight_seats) {
        $flight_id = $_POST['reserv_flight_id'];
        $flight_seats = $flight_seats - 1;
        $this->modSeats($flight_id, $flight_seats);    
    }
    // Substract from seats depending on passenger number
    public function removePassengerSeats($flight_id, $flight_seats, $flight_passengers_seats) {
        $flight_id = $_POST['passengers_flight_id'];
        $flight_seats = $flight_seats - $flight_passengers_seats;
        $this->modSeats($flight_id, $flight_seats);    
    }
    // Add seat
    public function addSeat($flight_id) {
        $flight_id = $_POST['update_flight_id'];
        $reserv_seats = $_POST['update_reserv_seats'];
        $this->upSeats($flight_id, $reserv_seats);
    }
    // Delete flight from the table
    public function deleteFlights() {
        $flight_id = $_POST['delete_flight_id'];
        $this->delFlights($flight_id);
    }
}