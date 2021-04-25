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
    // Flight Construct
    /* public function __construct($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_arrival_time, $flight_price, $flight_seats) {
        $this->flight_type = $flight_type;
        $this->flight_origin = $flight_origin;
        $this->flight_destination = $flight_destination;
        $this->flight_departure_time = $flight_departure_time;
        $this->flight_return_time = $flight_return_time;
        $this->flight_price = $flight_price;
        $this->flight_seats = $flight_seats;
    } */
    /* Flight Methods */
    // Prepare the insertion into the flights table
    protected function setFlights($flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats) {
        $sql = "INSERT INTO flights (flight_type, flight_origin, flight_destination, flight_departure_time, flight_return_time, flight_price, flight_seats)
        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats]);
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
        $sql = "UPDATE flights SET flight_type=?, flight_origin=?, flight_destination=?, flight_departure_time=?, flight_return_time=?, flight_price=?, flight_seats=?
        WHERE flight_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_price, $flight_seats]);
    }
    // Prepare the deletion of a flight in the flights table
    protected function delFlights($flight_id) {
        $sql = "DELETE FROM flights WHERE flight_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$flight_id]);
    }
}
?>