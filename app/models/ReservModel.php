<?php
class ReservModel extends Dbh {
    // Reservation Properties
    public $reserv_id;
    public $users_id;
    public $flight_id;
    public $reserv_status;
    /* Reservation Methods */
    // Prepare the insertion into the reservations table
    protected function setReserv($users_id, $flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $reserv_status) {
        // Verify reservation with the user and flight id's...
        $sql = "SELECT * FROM reservations WHERE users_id='$users_id' AND flight_id='$flight_id'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch();
        // ...to not allow for duplicate reservations
        if ($users_id == $result['users_id'] && $flight_id == $result['flight_id']) { 
            $_SESSION['reserv-error'] = 'You already booked this flight';
            header("Location: flights");
        } else {
            $sql = "INSERT INTO reservations (users_id, flight_id, reserv_type, reserv_origin, reserv_destination, reserv_departure_time, reserv_status)
            VALUES (:users_id, :flight_id, :reserv_type, :reserv_origin, :reserv_destination, :reserv_departure_time, :reserv_status)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':users_id', $users_id);
            $stmt->bindParam(':flight_id', $flight_id);
            $stmt->bindParam(':reserv_type', $flight_type);
            $stmt->bindParam(':reserv_origin', $flight_origin);
            $stmt->bindParam(':reserv_destination', $flight_destination);
            $stmt->bindParam(':reserv_departure_time', $flight_departure_time);
            $stmt->bindParam(':reserv_status', $reserv_status);
            $stmt->execute();
            if ($flight_type === 'One Way') {
                header("Location: reservations");
            } else
            // If flight type is "Round Trip" create another row with inversed origin/destination and departure time as the return time of the flight
            if ($flight_type === 'Round Trip') {
                $sql2 = "INSERT INTO reservations (users_id, flight_id, reserv_type, reserv_origin, reserv_destination, reserv_departure_time, reserv_status)
                VALUES (:users_id, :flight_id, :reserv_type, :reserv_origin, :reserv_destination, :reserv_departure_time, :reserv_status)";
                $stmt2 = $this->connect()->prepare($sql2);
                $stmt2->bindParam(':users_id', $users_id);
                $stmt2->bindParam(':flight_id', $flight_id);
                $stmt2->bindParam(':reserv_type', $flight_type);
                $stmt2->bindParam(':reserv_origin', $flight_destination);
                $stmt2->bindParam(':reserv_destination', $flight_origin);
                $stmt2->bindParam(':reserv_departure_time', $flight_return_time);
                $stmt2->bindParam(':reserv_status', $reserv_status);
                $stmt2->execute();
                header("Location: reservations");
            }
        }
    }
    // Get all Reservations from the table for Admin
    protected function getReservations() {
        $sql = "SELECT * FROM reservations
        INNER JOIN users
        ON users.users_id = reservations.users_id
        INNER JOIN flights
        ON flights.flight_id = reservations.flight_id
        ";

        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }
    // Get defined User Reservations from the table
    protected function getUserReservation($users_id) {
        $sql = "SELECT * FROM reservations
        INNER JOIN users
        ON users.users_id = reservations.users_id
        INNER JOIN flights
        ON flights.flight_id = reservations.flight_id
        WHERE users.users_id='$users_id'
        ";

        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }
    // Prepare the modification of a reservation in the reservations table
    protected function modReserv($reserv_id, $reserv_status) {
        $sql = "UPDATE reservations SET reserv_status=:reserv_status
        WHERE reserv_id = :reserv_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':reserv_id', $reserv_id);
        $stmt->bindParam(':reserv_status', $reserv_status);
        $stmt->execute();
    }
    // Prepare the deletion of a reservation in the reservations table
    protected function delReserv($reserv_id) {
        $sql = "DELETE FROM reservations WHERE reserv_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reserv_id]);
    }
}
?>