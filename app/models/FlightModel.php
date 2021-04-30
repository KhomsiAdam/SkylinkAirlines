<?php
class FlightModel extends Dbh {
    // Flight Properties
    public $flight_id;
    public $flight_type;
    public $flight_origin;
    public $flight_destination;
    public $flight_departure_time;
    public $flight_return_time;
    public $flight_price;
    public $flight_seats;
    /* Flight Methods */
    // Prepare the insertion into the flights table
    protected function setFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        $sql = "INSERT INTO flights (flight_type, flight_origin, flight_destination, flight_departure_time, flight_return_time, flight_price, flight_seats)
        VALUES (:flight_type, :flight_origin, :flight_destination, :flight_departure_time, :flight_return_time, :flight_price, :flight_seats)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':flight_type', $flight_type);
        $stmt->bindParam(':flight_origin', $flight_origin);
        $stmt->bindParam(':flight_destination', $flight_destination);
        $stmt->bindParam(':flight_departure_time', $flight_departure_time);
        $stmt->bindParam(':flight_return_time', $flight_return_time);
        $stmt->bindParam(':flight_price', $flight_price);
        $stmt->bindParam(':flight_seats', $flight_seats);
        $stmt->execute();
}
    // Get all flights from the table
    protected function getFlights() {
        $sql = "SELECT * FROM flights";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }
    // Prepare the modification of a flight in the flights table
    protected function modFlights($flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        $sql = "UPDATE flights SET flight_type=:flight_type, flight_origin=:flight_origin, flight_destination=:flight_destination, flight_departure_time=:flight_departure_time, flight_return_time=:flight_return_time, flight_price=:flight_price, flight_seats=:flight_seats
        WHERE flight_id = :flight_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':flight_id', $flight_id);
        $stmt->bindParam(':flight_type', $flight_type);
        $stmt->bindParam(':flight_origin', $flight_origin);
        $stmt->bindParam(':flight_destination', $flight_destination);
        $stmt->bindParam(':flight_departure_time', $flight_departure_time);
        $stmt->bindParam(':flight_return_time', $flight_return_time);
        $stmt->bindParam(':flight_price', $flight_price);
        $stmt->bindParam(':flight_seats', $flight_seats);
        $stmt->execute();
    }
    // Prepare the deletion of a flight in the flights table
    protected function delFlights($flight_id) {
        $sql = "DELETE FROM flights WHERE flight_id = :flight_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':flight_id', $flight_id);
        $stmt->execute();
    }
}
?>