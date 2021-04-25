<?php
class FlightView extends FlightModel {
    // Show all flights in the table
    public function showFlights() {
        $results = $this->getFlights();
        foreach ($results as $result) {
            if ($result['flight_type'] === 'Round Trip') {
                echo $result['flight_id'] . ' ' . $result['flight_type'] . ' ' . $result['flight_origin'] . ' ' . $result['flight_destination'] . ' ' . $result['flight_departure_time'] . ' ' . $result['flight_return_time'] . ' ' . $result['flight_price'] . ' ' . $result['flight_seats'] . '<br>';
            } else {
                echo $result['flight_id'] . ' ' . $result['flight_type'] . ' ' . $result['flight_origin'] . ' ' . $result['flight_destination'] . ' ' . $result['flight_departure_time'] . ' ' . $result['flight_price'] . ' ' . $result['flight_seats'] . '<br>';
            }
        }
    }
}
?>