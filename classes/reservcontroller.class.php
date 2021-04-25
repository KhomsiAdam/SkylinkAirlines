<?php
class ReservController extends ReservModel {
    // Create reservation in the table
    public function createReserv($users_id, $flight_id, $reserv_status) {
        $this->setReserv($users_id, $flight_id, $reserv_status);
    }
    // Update reservation status in the table
    public function updateReserv() {
        $reserv_id = $_POST['reserv_id'];
        $reserv_status = $_POST['reserv_status'];
        $this->modReserv($reserv_id, $reserv_status);
    }
    // Delete Reservation from the table
    public function deleteReserv() {
        $reserv_id = $_POST['reserv_id'];
        $this->delReserv($reserv_id);
    }
}
?>