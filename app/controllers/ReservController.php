<?php
class ReservController extends ReservModel {
    // Create reservation in the table
    public function createReserv($users_id, $flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_seats, $reserv_status) {
        function validateReservationCreation($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $users_id = validateReservationCreation($_POST['reserv_user_id']);
        $flight_id = validateReservationCreation($_POST['reserv_flight_id']);

        $flight_type = validateReservationCreation($_POST['flight_type']);
        $flight_origin = validateReservationCreation($_POST['flight_origin']);
        $flight_destination = validateReservationCreation($_POST['flight_destination']);

        $flight_departure_time = validateReservationCreation(date("Y-m-d H:i:s", strtotime($_POST['flight_departure_time'])));
        $flight_return_time = validateReservationCreation(date("Y-m-d H:i:s", strtotime($_POST['flight_return_time'])));

        $reserv_status = validateReservationCreation($_POST['reserv_status']);

        $flight_seats = validateReservationCreation($_POST['reserv_flight_seats']);

        $this->setReserv($users_id, $flight_id, $flight_type, $flight_origin, $flight_destination, $flight_departure_time, $flight_return_time, $flight_seats, $reserv_status);
    }
    // Update reservation status in the table
    public function updateReserv($users_id, $flight_id, $reserv_status) {
        $users_id = $_POST['update_users_id'];
        $flight_id = $_POST['update_flight_id'];
        $reserv_status = $_POST['update_reserv_status'];
        $this->modReservStatus($users_id, $flight_id, $reserv_status);
    }
    // Update reservation seats in the table based on passenger number
    public function addPassengerSeats($reserv_id, $flight_passengers_seats) {
        $this->modReservSeats($reserv_id, $flight_passengers_seats);
    }
    // Delete Reservation from the table
    public function deleteReserv() {
        $reserv_id = $_POST['reserv_id'];
        $this->delReserv($reserv_id);
    }
}