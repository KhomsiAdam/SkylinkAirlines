<?php
class PassengerView extends PassengerModel
{
    // Show all flights in the table
    public function showPassengers()
    {
        $results = $this->getPassengers();

        echo "<table class='table table-bordered' id='passengers-list'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center'>Id</th>";
        echo "<th class='text-center'>Passenger Informations</th>";
        echo "<th class='text-center'>Flight Informations</th>";
        echo "<th class='text-center'>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";



        foreach ($results as $result) {
            echo "<tr>";
            echo "<td class='text-right'>";
            echo $result['reserv_id'];
            echo "</td>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<div class='col-sm-6'>";
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
            echo "<div class='col-sm-6'>";
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
            echo date('M d,Y h:i A', strtotime($result['reserv_departure_time']));
            echo "</small></b></p>";
            echo "</div>";
            echo "</div>";
            echo "<td class='text-right'>";
            echo $result['reserv_status'];
            echo "</td>";
            echo "</tr>";
            // if ($result['reserv_type'] === 'Round Trip') {
            //     echo "<tr>";
            //     echo "<td class='text-right'>";
            //     echo $result['reserv_id'];
            //     echo "</td>";
            //     echo "<td>";
            //     echo "<div class='row'>";
            //     echo "<div class='col-sm-6'>";
            //     echo "<p>Name :<b>";
            //     echo $result['passengers_firstname'] . ' ' . $result['passengers_lastname'];
            //     echo "</b></p>";
            //     echo "<p><small>Date Of Birth :<b>";
            //     echo $result['passengers_dateofbirth'];
            //     echo "</small></b></p>";
            //     echo "<p><small>Country :<b>";
            //     echo $result['passengers_country'];
            //     echo "</small></b></p>";
            //     echo "</div>";
            //     echo "</div>";
            //     echo "</td>";
            //     echo "<td>";
            //     echo "<div class='row'>";
            //     echo "<div class='col-sm-6'>";
            //     echo "<p>Type :<b>";
            //     echo $result['reserv_type'];
            //     echo "</b></p>";
            //     echo "<p><small>Origin :<b>";
            //     echo $result['reserv_destination'];
            //     echo "</small></b></p>";
            //     echo "<p><small>Destination :<b>";
            //     echo $result['reserv_origin'];
            //     echo "</small></b></p>";
            //     echo "<p><small>Departure :<b>";
            //     echo date('M d,Y h:i A', strtotime($result['reserv_departure_time']));
            //     echo "</small></b></p>";
            //     echo "</div>";
            //     echo "</div>";
            //     echo "<td class='text-right'>";
            //     echo $result['reserv_status'];
            //     echo "</td>";

            //     echo "</tr>";
            // }
        }
        echo " </tbody>";
        echo "</table>";
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