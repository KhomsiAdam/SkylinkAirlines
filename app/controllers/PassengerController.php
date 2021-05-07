<?php
class PassengerController extends PassengerModel {
    // Insert passengers into the table
    public function addPassenger($flight_passengers_seats) {
        function validatePassengers($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // TODO: Validation through Array
        $flight_type = $_POST['passengers_flight_type'];
        $passengers_firstname = $_POST['passengers_firstname'];
        $passengers_lastname = $_POST['passengers_lastname'];
        $passengers_dateofbirth = $_POST['passengers_dateofbirth'];
        $passengers_country = $_POST['passengers_country'];
        $this->insertPassenger($flight_type, $passengers_firstname, $passengers_lastname, $passengers_dateofbirth, $passengers_country, $flight_passengers_seats);
    }
}