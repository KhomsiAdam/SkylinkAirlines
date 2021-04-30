<?php
class ReservView extends ReservModel
{
    // Show all flights in the table
    public function showReservations()
    {
        $results = $this->getReservations();
        /* foreach ($results as $result) {
            echo $result['users_firstname'] . ' ' . $result['users_lastname'] . ' ' . $result['users_email'] . ' ' . $result['users_dateofbirth'] . ' ' . $result['users_country'] . '<br>';
            echo $result['flight_type'] . ' ' . $result['flight_origin'] . ' ' . $result['flight_destination'] . ' ' . $result['flight_departure_time'] . ' ' . $result['flight_return_time'] . ' ' . $result['flight_price'] . ' ' . $result['flight_seats'] . '<br>';
            echo $result['reserv_status'];
        } */
        echo "<table class='table table-bordered' id='reserv-list'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center'>Id</th>";
        echo "<th class='text-center'>User Informations</th>";
        echo "<th class='text-center'>Flight Informations</th>";
        echo "<th class='text-center'>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        /* $airport = $conn->query("SELECT * FROM airport_list ");
							while($row = $airport->fetch_assoc()){
								$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
							}
							$qry = $conn->query("SELECT f.*,a.airlines,a.logo_path FROM flight_list f inner join airlines_list a on f.airline_id = a.id  order by id desc");
							while($row = $qry->fetch_assoc()):
								$booked = $conn->query("SELECT * FROM booked_flight where flight_id = ".$row['id'])->num_rows; */



        foreach ($results as $result) {
            echo "<tr>";
            echo "<td class='text-right'>";
            echo $result['reserv_id'];
            echo "</td>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<div class='col-sm-6'>";
            echo "<p>Name :<b>";
            echo $result['users_firstname'] . ' ' . $result['users_lastname'];
            echo "</b></p>";
            echo "<p><small>Email :<b>";
            echo $result['users_email'];
            echo "</small></b></p>";
            echo "<p><small>Date Of Birth :<b>";
            echo $result['users_dateofbirth'];
            echo "</small></b></p>";
            echo "<p><small>Country :<b>";
            echo $result['users_country'];
            echo "</small></b></p>";
            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<div class='col-sm-6'>";
            echo "<p>Type :<b>";
            echo $result['flight_type'];
            echo "</b></p>";
            echo "<p><small>Origin :<b>";
            echo $result['flight_origin'];
            echo "</small></b></p>";
            echo "<p><small>Destination :<b>";
            echo $result['flight_destination'];
            echo "</small></b></p>";
            echo "<p><small>Departure :<b>";
            echo date('M d,Y h:i A', strtotime($result['flight_departure_time']));
            echo "</small></b></p>";
            echo "</div>";
            echo "</div>";
            echo "<td class='text-right'>";
            echo $result['reserv_status'];
            echo "</td>";
            echo "</tr>";
            if ($result['flight_type'] === 'Round Trip') {
                echo "<tr>";
                echo "<td class='text-right'>";
                echo $result['reserv_id'];
                echo "</td>";
                echo "<td>";
                echo "<div class='row'>";
                echo "<div class='col-sm-6'>";
                echo "<p>Name :<b>";
                echo $result['users_firstname'] . ' ' . $result['users_lastname'];
                echo "</b></p>";
                echo "<p><small>Email :<b>";
                echo $result['users_email'];
                echo "</small></b></p>";
                echo "<p><small>Date Of Birth :<b>";
                echo $result['users_dateofbirth'];
                echo "</small></b></p>";
                echo "<p><small>Country :<b>";
                echo $result['users_country'];
                echo "</small></b></p>";
                echo "</div>";
                echo "</div>";
                echo "</td>";
                echo "<td>";
                echo "<div class='row'>";
                echo "<div class='col-sm-6'>";
                echo "<p>Type :<b>";
                echo $result['flight_type'];
                echo "</b></p>";
                echo "<p><small>Origin :<b>";
                echo $result['flight_destination'];
                echo "</small></b></p>";
                echo "<p><small>Destination :<b>";
                echo $result['flight_origin'];
                echo "</small></b></p>";
                echo "<p><small>Departure :<b>";
                echo date('M d,Y h:i A', strtotime($result['flight_return_time']));
                echo "</small></b></p>";
                echo "</div>";
                echo "</div>";
                echo "<td class='text-right'>";
                echo $result['reserv_status'];
                echo "</td>";

                echo "</tr>";
            }
        }
        echo " </tbody>";
        echo "</table>";
    }
    // Show all flights in the table
    public function showUserReservation($users_id)
    {
        $results = $this->getUserReservation($users_id);
        // Shows Table with all the Reservations into HTML for specific user
        echo "<table class='table table-bordered' id='reserv-list'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th class='text-center'>Id</th>";
                    echo "<th class='text-center'>User Informations</th>";
                    echo "<th class='text-center'>Flight Informations</th>";
                    echo "<th class='text-center'>Status</th>";
                    echo "<th class='text-center'>Action</th>";
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
                                echo $result['users_firstname'] . ' ' . $result['users_lastname'];
                            echo "</b></p>";
                            echo "<p><small>Email :<b>";
                                echo $result['users_email'];
                            echo "</small></b></p>";
                            echo "<p><small>Date Of Birth :<b>";
                                echo $result['users_dateofbirth'];
                            echo "</small></b></p>";
                            echo "<p><small>Country :<b>";
                                echo $result['users_country'];
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
                    $_SESSION['reserv_status'] = $result['reserv_status'];
                echo "</td>";
                echo "<td class='text-center'>";
                    if ($_SESSION['reserv_status'] == 'Confirmed') {
                        echo "<button class='btn btn-outline-primary btn-sm reserv_print' type='button' onclick='print()'>Print Ticket <i class='fas fa-print'></i></button>";
                        echo "<button class='btn btn-outline-danger btn-sm reserv_cancel' type='button' data-bs-toggle='modal' data-bs-target='#reservStatusModal'>Cancel Flight <i class='fas fa-ban'></i></button>";                
                    } else {
                        echo "<button class='btn btn-outline-secondary btn-sm reserv_print disabled' type='button' onclick='print()'>Print Ticket <i class='fas fa-print'></i></button>";
                        echo "<button class='btn btn-outline-secondary btn-sm reserv_cancel disabled' type='button' data-bs-toggle='modal' data-bs-target='#reservStatusModal'>Cancel Flight <i class='fas fa-ban'></i></button>";                
                    }
                echo "</td>";
                echo "</tr>";
            }
            echo " </tbody>";
        echo "</table>";
        // Cancel Confirmation Modal
        echo '<div class="modal fade" id="reservStatusModal" tabindex="-1" aria-labelledby="reservStatusLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-dialog-centered">';
                echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="reservStatusLabel">Confirmation</h5>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                        echo '<form action="updatereserv.php" class="update-form" id="update-form" method="POST">';
                            echo '<input type="text" id="update_reserv_id" name="update_reserv_id" readonly>';
                            echo '<input type="text" id="update_reserv_status" name="update_reserv_status" readonly value="Cancelled">';
                        echo '</form>';
                        echo 'Are you sure you wanna cancel this flight ?';
                    echo '</div>';
                    echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
                        echo '<button type="submit" form="update-form" class="btn btn-primary">Confirm</button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
?>