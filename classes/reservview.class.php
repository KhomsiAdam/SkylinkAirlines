<?php
class ReservView extends ReservModel {
    // Show all flights in the table
    public function showReservations() {
        $results = $this->getReservations();
        foreach ($results as $result) {
            echo $result['users_firstname'] . ' ' . $result['users_lastname'] . ' ' . $result['users_email'] . ' ' . $result['users_dateofbirth'] . ' ' . $result['users_country'] . '<br>';
            echo $result['flight_type'] . ' ' . $result['flight_origin'] . ' ' . $result['flight_destination'] . ' ' . $result['flight_departure_time'] . ' ' . $result['flight_return_time'] . ' ' . $result['flight_price'] . ' ' . $result['flight_seats'] . '<br>';
            echo $result['reserv_status'];
        }
    }
}
?>