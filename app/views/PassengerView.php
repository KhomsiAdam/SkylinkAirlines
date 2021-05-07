<?php
class PassengerView extends PassengerModel
{
    // Show all flights in the table
    public function showPassengers()
    {
        $results = $this->getPassengers();
        echo "<div class='table-responsive m-3'>";
        echo "<table class='table table-bordered table-hover table-light table-striped align-middle' id='passengers-list'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center reserv-id'>Id</th>";
        echo "<th class='text-center'>Passenger Informations</th>";
        echo "<th class='text-center'>Flight Informations</th>";
        echo "<th class='text-center'>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($results as $result) {
            echo "<tr>";
            echo "<td class='text-right reserv-id'>";
            echo $result['reserv_id'];
            echo "</td>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<div class='m-4'>";
            echo "<p>Name :<b>";
            echo $result['passengers_firstname'] . ' ' . $result['passengers_lastname'];
            echo "</b></p>";
            echo "<p><small>Date Of Birth :<b>";
            echo $result['passengers_dateofbirth'];
            echo "</small></b></p>";
            echo "<p><small>Country :<b>";
            echo $result['passengers_country'];
            echo "</small></b></p>";
            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<div class='m-4'>";
            echo "<p>Type :<b>";
            echo $result['reserv_type'];
            echo "</b></p>";
            echo "<p><small>Origin :<b>";
            echo $result['reserv_origin'];
            echo "</small></b></p>";
            echo "<p><small>Destination :<b>";
            echo $result['reserv_destination'];
            echo "</small></b></p>";
            echo "<p><small>Departure :<b>";
            echo date('M d Y h:i A', strtotime($result['reserv_departure_time']));
            echo "</small></b></p>";
            echo "</div>";
            echo "</div>";
            echo "<td class='text-center'>";
            echo $result['reserv_status'];
            echo "<br><br>";
            $_SESSION['reserv_status'] = $result['reserv_status'];
            if ($_SESSION['reserv_status'] == 'Confirmed') {
                echo "<small>"; echo date('M d Y', strtotime($result['reserv_created_at'])); echo "</small><br>";
                echo "<small>"; echo date('h:i A', strtotime($result['reserv_created_at'])); echo "</small>";
            } else {
                echo "<small>"; echo date('M d Y', strtotime($result['reserv_updated_at'])); echo "</small><br>";
                echo "<small>"; echo date('h:i A', strtotime($result['reserv_updated_at'])); echo "</small>";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo " </tbody>";
        echo "</table>";
        echo "</div>";
    }

    public function showReservPassengers($reserv_id){
        $presults = $this->getReservPassengers($reserv_id);
        foreach ($presults as $presult) {
            echo "<p>Name :<b>";
            echo $presult['passengers_firstname'] . ' ' . $presult['passengers_lastname'];
            echo "</b></p>";
        }
    }
}
?>