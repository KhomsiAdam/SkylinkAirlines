<?php
class ReservModel extends Dbh {
    // Reservation Properties
    public $reserv_id;
    public $users_id;
    public $flight_id;
    public $reserv_status;
    // Reservation Construct
    
    /* Reservation Methods */
    // Prepare the insertion into the reservations table
    protected function setReserv($users_id, $flight_id, $reserv_status) {
        $sql = "INSERT INTO reservations (users_id, flight_id, reserv_status)
        VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$users_id, $flight_id, $reserv_status]);
    }
    // Get all Reservations from the table
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
    // Prepare the modification of a reservation in the reservations table
    protected function modReserv($reserv_id, $reserv_status) {
        $sql = "UPDATE reservations SET reserv_status=?
        WHERE reserv_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reserv_id, $reserv_status]);
    }
    // Prepare the deletion of a reservation in the reservations table
    protected function delReserv($reserv_id) {
        $sql = "DELETE FROM reservations WHERE reserv_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reserv_id]);
    }
}
?>