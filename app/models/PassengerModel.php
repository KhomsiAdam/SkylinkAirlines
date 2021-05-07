<?php
class PassengerModel extends Dbh {
    // Passenger Properties
    public $passengers_id;
    public $reserv_id;
    public $passengers_firstname;
    public $passengers_lastname;
    public $passengers_dateofbirth;
    public $passengers_country;
    /* Passenger Methods */
    // Prepare the insertion into the passengers table
    protected function insertPassenger($flight_type, $passengers_firstname, $passengers_lastname, $passengers_dateofbirth, $passengers_country, $flight_passengers_seats) {
        // TODO: Verify if passenger exists in the table...
        // $sql = "SELECT * FROM users WHERE passengers_firstname='$passengers_firstname'";
        // $stmt = $this->connect()->query($sql);
        // $result = $stmt->fetch();
        // if ($passengers_firstname == $result['passengers_firstname']) { 
        //     $_SESSION['passenger-error'] = 'Passenger already exists';
        //     header("Location: signup");
        // } else {
            $flight_id = $_POST['passengers_flight_id'];
            $users_id = $_POST['passengers_users_id'];
            $sql = "SELECT * FROM reservations WHERE users_id='$users_id' AND flight_id=$flight_id";
            $stmt = $this->connect()->query($sql);
            $results = $stmt->fetchAll();
            
            $pseats_obj = new ReservController();
            $pseats_obj->addPassengerSeats($results[0]['reserv_id'], $flight_passengers_seats);            
            for ($row = 0; $row < count($passengers_firstname); $row++) {
                $sql = "INSERT INTO passengers (reserv_id, passengers_firstname, passengers_lastname, passengers_dateofbirth, passengers_country)
                VALUES (:reserv_id, :passengers_firstname, :passengers_lastname, :passengers_dateofbirth, :passengers_country)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(':reserv_id', $results[0]['reserv_id']);
                $stmt->bindParam(':passengers_firstname', $passengers_firstname[$row]);
                $stmt->bindParam(':passengers_lastname', $passengers_lastname[$row]);
                $stmt->bindParam(':passengers_dateofbirth', $passengers_dateofbirth[$row]);
                $stmt->bindParam(':passengers_country', $passengers_country[$row]);
                $stmt->execute();
            }
            if ($flight_type == 'Round Trip') {
                $pseats_obj = new ReservController();
                $pseats_obj->addPassengerSeats($results[1]['reserv_id'], $flight_passengers_seats);            
                for ($row = 0; $row < count($passengers_firstname); $row++) {
                    $sql = "INSERT INTO passengers (reserv_id, passengers_firstname, passengers_lastname, passengers_dateofbirth, passengers_country)
                    VALUES (:reserv_id, :passengers_firstname, :passengers_lastname, :passengers_dateofbirth, :passengers_country)";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->bindParam(':reserv_id', $results[1]['reserv_id']);
                    $stmt->bindParam(':passengers_firstname', $passengers_firstname[$row]);
                    $stmt->bindParam(':passengers_lastname', $passengers_lastname[$row]);
                    $stmt->bindParam(':passengers_dateofbirth', $passengers_dateofbirth[$row]);
                    $stmt->bindParam(':passengers_country', $passengers_country[$row]);
                    $stmt->execute();
                    header("Location: reservations");
                }
            } else {
                header("Location: reservations");
            }
        }
    // Get all passengers from the passengers table
    protected function getPassengers() {
        $sql = "SELECT * FROM passengers
        INNER JOIN reservations
        ON reservations.reserv_id = passengers.reserv_id";
        
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }
    // Get all passengers related to a reservation
    protected function getReservPassengers($reserv_id) {
        $sql = "SELECT * FROM passengers
        INNER JOIN reservations
        ON reservations.reserv_id = passengers.reserv_id
        WHERE reservations.reserv_id='$reserv_id'
        ";

        $stmt = $this->connect()->query($sql);
        $presults = $stmt->fetchAll();
        return $presults;
    }
}