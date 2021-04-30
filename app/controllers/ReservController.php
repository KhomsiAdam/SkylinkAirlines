<?php
class ReservController extends ReservModel {
    // Create reservation in the table
    public function createReserv($users_id, $flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $reserv_status) {
        $users_id = $_POST['reserv_user_id'];
        $flight_id = $_POST['reserv_flight_id'];

        $flight_type = $_POST['flight_type'];
        $flight_origin = $_POST['flight_origin'];
        $flight_destination = $_POST['flight_destination'];

        $flight_departure_time = date("Y-m-d H:i:s", strtotime($_POST['flight_departure_time']));
        $flight_return_time = date("Y-m-d H:i:s", strtotime($_POST['flight_return_time']));

        $reserv_status = $_POST['reserv_status'];

        $this->setReserv($users_id, $flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $reserv_status);
    }
    // Update reservation status in the table
    public function updateReserv($reserv_id, $reserv_status) {
        $reserv_id = $_POST['update_reserv_id'];
        $reserv_status = $_POST['update_reserv_status'];
        $this->modReserv($reserv_id, $reserv_status);
    }
    // Delete Reservation from the table
    public function deleteReserv() {
        $reserv_id = $_POST['reserv_id'];
        $this->delReserv($reserv_id);
    }
}
?>