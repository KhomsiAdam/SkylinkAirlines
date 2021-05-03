<?php
class PassengerController extends PassengerModel {
    // Insert specified user into the table
    public function addPassenger($flight_passengers_seats) {
        // TEST
        // $flight_id = $_POST['passengers_flight_id'];
        // $users_id = $_POST['passengers_users_id'];
        // $sql = "SELECT * FROM reservations WHERE users_id='$users_id' AND flight_id=$flight_id";
        // $stmt = $this->connect()->query($sql);
        // $results = $stmt->fetch();
        // $reserv_id = $results;
        // TEST
        //$reserv_id = $_POST['passengers_reserv_id'];
        function validatePassengers($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        $flight_type = $_POST['passengers_flight_type'];
        $passengers_firstname = validatePassengers($_POST['passengers_firstname']);
        $passengers_lastname = validatePassengers($_POST['passengers_lastname']);
        $passengers_dateofbirth = validatePassengers($_POST['passengers_dateofbirth']);
        $passengers_country = validatePassengers($_POST['passengers_country']);
        $this->insertPassenger($flight_type, $passengers_firstname, $passengers_lastname, $passengers_dateofbirth, $passengers_country, $flight_passengers_seats);
    }
}
?>