<?php
class ReservView extends ReservModel
{
    // Show all Reservations in the table
    public function showReservations()
    {
        $results = $this->getReservations();
        echo "<table class='table table-bordered' id='reserv-list'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center'>Id</th>";
        echo "<th class='text-center'>User Informations</th>";
        echo "<th class='text-center'>Flight Informations</th>";
        echo "<th class='text-center'>Status</th>";
        echo "<th class='text-center'>Reserved seats</th>";
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
            echo "</td>";
            echo "<td class='text-right'>";
            echo $result['reserv_seats'];
            echo "</td>";
            echo "</tr>";
        }
        echo " </tbody>";
        echo "</table>";
    }
    // Show all Reservations by specific User in the table
    public function showUserReservation($users_id)
    {
        $results = $this->getUserReservation($users_id);
        // Shows Table with all the Reservations into HTML for specific user
        echo "<table class='table table-bordered' id='reserv-list'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th class='text-center'>Id</th>";
                    echo "<th class='text-center'>User Informations</th>";
                    echo "<th class='text-center'>Added Passengers</th>";
                    echo "<th class='text-center'>Flight Informations</th>";
                    echo "<th class='text-center'>Status</th>";
                    echo "<th class='text-center'>Reserved seats</th>";
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
                            echo "<p>User Id :<b>";
                                echo $result['users_id'];
                            echo "</b></p>";
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
                            $passengers_obj = new PassengerView();
                            $reserv_id = $result['reserv_id'];;
                            $passengers_obj->showReservPassengers($reserv_id);
                        echo "</div>";
                    echo "</div>";
                echo "</td>";
                echo "<td>";
                    echo "<div class='row'>";
                        echo "<div class='col-sm-6'>";
                        echo "<p>Flight Id :<b>";
                            echo $result['flight_id'];
                        echo "</b></p>";
                        echo "<p>Flight Seats :<b id='reserv_flight_seats'>";
                            echo $result['flight_seats'];
                        echo "</b></p>";
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
                echo "<td class='text-right'>";
                echo $result['reserv_seats'];
                echo "</td>";
                echo "<td class='text-center d-grid gap-2 col-6 mx-auto'>";
                    if ($_SESSION['reserv_status'] == 'Confirmed') {
                        echo "<button class='btn btn-outline-success btn-sm reserv_passenger' type='button' data-bs-toggle='modal' data-bs-target='#reservPassengerModal'>Include Passengers <i class='fas fa-users'></i></button>";
                        echo "<button class='btn btn-outline-primary btn-sm reserv_print' type='button' onclick='print()'>Print Ticket <i class='fas fa-print'></i></button>";
                        echo "<button class='btn btn-outline-danger btn-sm reserv_cancel' type='button' data-bs-toggle='modal' data-bs-target='#reservStatusModal'>Cancel Reservation <i class='fas fa-ban'></i></button>";                
                    } else {
                        echo "<button class='btn btn-outline-secondary btn-sm reserv_passenger disabled' type='button' data-bs-toggle='modal' data-bs-target='#reservPassengerModal'>Include Passengers <i class='fas fa-users'></i></button>";
                        echo "<button class='btn btn-outline-secondary btn-sm reserv_print disabled' type='button' onclick='print()'>Print Ticket <i class='fas fa-print'></i></button>";
                        echo "<button class='btn btn-outline-secondary btn-sm reserv_cancel disabled' type='button' data-bs-toggle='modal' data-bs-target='#reservStatusModal'>Cancel Reservation <i class='fas fa-ban'></i></button>";                
                    }
                echo "</td>";
                echo "</tr>";
            }
            echo " </tbody>";
        echo "</table>";
        // Add Passenger Modal
        echo '<div class="modal fade" id="reservPassengerModal" tabindex="-1" aria-labelledby="reservPassengerLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-dialog-centered">';
                echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="reservPassengerLabel">Confirmation</h5>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                        echo '<form action="createpassenger.php" class="passenger-form" id="passenger-form" method="POST">';
                            echo '<input type="text" id="passengers_reserv_id" name="passengers_reserv_id" readonly><br>';
                            echo '<input type="text" id="passengers_users_id" name="passengers_users_id" readonly><br>';
                            echo '<input type="text" id="passengers_flight_id" name="passengers_flight_id" readonly><br>';
                            echo '<input type="text" id="passengers_flight_type" name="passengers_flight_type" readonly><br>';
                            echo '<input type="text" id="passengers_available_flight_seats" name="passengers_available_flight_seats" readonly><br>';
                            echo '<input type="text" id="passengers_reserved_flight_seats" name="passengers_reserved_flight_seats" id="passengers_reserved_flight_seats" readonly value="0"><br>';
                            // echo '<input type="text" name="passengers_firstname[]" placeholder="Firstname">';
                            // echo '<input type="text" name="passengers_lastname[]" placeholder="Lastname">';
                            // echo '<input type="date" name="passengers_dateofbirth[]">';
                            // echo '<input type="text" name="passengers_country[]" placeholder="Country"><br>';
                        echo '</form>';
                        echo '<p class="col text-center" id="reserv_flight_seats_error"></p>';
                        echo "<button class='btn col-12 btn-outline-success btn-sm' type='button' id='add-passenger-button'><i class='fas fa-user-plus'></i> Add Passenger</i></button>";
                        echo "<button class='btn col-12 btn-outline-danger btn-sm disabled' type='button' id='remove-passenger-button'><i class='fas fa-user-minus'></i> Remove Passenger</i></button>";
                    echo '</div>';
                    echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
                        echo '<button type="submit" form="passenger-form" class="btn btn-primary">Confirm</button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
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
                            echo '<input type="text" id="update_users_id" name="update_users_id" readonly>';
                            echo '<input type="text" id="update_flight_id" name="update_flight_id" readonly>';
                            echo '<input type="text" id="update_reserv_status" name="update_reserv_status" readonly value="Cancelled">';
                            echo '<input type="text" id="update_reserv_seats" name="update_reserv_seats" readonly>';
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