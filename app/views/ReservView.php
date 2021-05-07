<?php
class ReservView extends ReservModel
{
    // Show all Reservations in the table
    public function showReservations()
    {
        $results = $this->getReservations();
        echo "<div class='table-responsive m-3'>";
        echo "<table class='table table-bordered table-hover table-light table-striped align-middle id='reserv-list'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center reserv-id'>Id</th>";
        echo "<th class='text-center col-md-4'>User Informations</th>";
        echo "<th class='text-center col-md-4'>Flight Informations</th>";
        echo "<th class='text-center col-md-2'>Status</th>";
        echo "<th class='text-center col-md-2'>Reserved seats</th>";
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
            echo $result['users_firstname'] . ' ' . $result['users_lastname'];
            echo "</b></p>";
            echo "<p><small>Email :<b>";
            echo $result['users_email'];
            echo "</small></b></p>";
            echo "<p><small>Date Of Birth :<b>";
            echo date('m/d/Y', strtotime($result['users_dateofbirth']));
            echo "</small></b></p>";
            echo "<p><small>Country :<b>";
            echo $result['users_country'];
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
            echo "<td class='text-center'>";
            echo $result['reserv_seats'];
            echo "</td>";
            echo "</tr>";
        }
        echo " </tbody>";
        echo "</table>";
        echo "</div>";
    }
    // Show all Reservations by specific User in the table
    public function showUserReservation($users_id)
    {
        $results = $this->getUserReservation($users_id);
        // Shows Table with all the Reservations into HTML for specific user
        echo "<div class='table-responsive m-3'>";
        echo "<table class='table table-bordered table-hover table-light table-striped align-middle' id='reserv-list'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th class='text-center reserv-id'>Id</th>";
                    echo "<th class='text-center col-md-2'>User Informations</th>";
                    echo "<th class='text-center col-md-2'>Added Passengers</th>";
                    echo "<th class='text-center col-md-2'>Flight Informations</th>";
                    echo "<th class='text-center col-md-1'>Status</th>";
                    echo "<th class='text-center col-md-1'>Reserved seats</th>";
                    echo "<th class='text-center col-md-3'>Action</th>";
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
                            echo "<p class='user-id'>User Id: <b>";
                                echo $result['users_id'];
                            echo "</b></p>";
                            echo "<p>Name: <b>";
                                echo $result['users_firstname'] . ' ' . $result['users_lastname'];
                            echo "</b></p>";
                            echo "<p><small>Email: <b>";
                                echo $result['users_email'];
                            echo "</small></b></p>";
                            echo "<p><small>Date Of Birth: <b>";
                                echo date('m/d/Y', strtotime($result['users_dateofbirth']));
                            echo "</small></b></p>";
                            echo "<p><small>Country: <b>";
                                echo $result['users_country'];
                            echo "</small></b></p>";
                        echo "</div>";
                    echo "</div>";
                echo "</td>";
                echo "<td>";
                    echo "<div class='row'>";
                        echo "<div class='m-4'>";
                            $passengers_obj = new PassengerView();
                            $reserv_id = $result['reserv_id'];;
                            $passengers_obj->showReservPassengers($reserv_id);
                        echo "</div>";
                    echo "</div>";
                echo "</td>";
                echo "<td>";
                    echo "<div class='row'>";
                        echo "<div class='m-4'>";
                        echo "<p class='flight-id'>Flight Id: <b>";
                            echo $result['flight_id'];
                        echo "</b></p>";
                        echo "<p>Available Seats: <b id='reserv_flight_seats'>";
                            echo $result['flight_seats'];
                        echo "</b></p>";
                        echo "<p>Type: <b>";
                            echo $result['reserv_type'];
                        echo "</b></p>";
                        echo "<p><small>Origin: <b>";
                            echo $result['reserv_origin'];
                        echo "</small></b></p>";
                        echo "<p><small>Destination: <b>";
                            echo $result['reserv_destination'];
                        echo "</small></b></p>";
                        echo "<p><small>Departure: <b>";
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
                echo "<td class='text-center'>";
                echo $result['reserv_seats'];
                echo "</td>";
                echo "<td class='text-center'>";
                    if ($_SESSION['reserv_status'] == 'Confirmed') {
                        echo "<button class='btn btn-outline-success btn-lg col-md-8 m-3 reserv_passenger' type='button' data-bs-toggle='modal' data-bs-target='#addPassengersModal'><i class='fas fa-users'></i><br>Include Passengers</button>";
                        echo "<button class='btn btn-outline-primary btn-lg col-md-8 m-3 reserv_print' type='button'><i class='fas fa-print'></i><br>Print Ticket</button>";
                        echo "<button class='btn btn-outline-danger btn-lg col-md-8 m-3 reserv_cancel' type='button' data-bs-toggle='modal' data-bs-target='#reservStatusModal'><i class='fas fa-ban'></i><br>Cancel Reservation</button>";                
                    } else {
                        echo "<button class='btn btn-outline-secondary btn-lg col-md-8 m-3 reserv_passenger disabled' type='button' data-bs-toggle='modal' data-bs-target='#addPassengersModal'><i class='fas fa-users'></i><br>Include Passengers</button>";
                        echo "<button class='btn btn-outline-secondary btn-lg col-md-8 m-3 reserv_print disabled' type='button'><i class='fas fa-print'></i><br>Print Ticket</button>";
                        echo "<button class='btn btn-outline-secondary btn-lg col-md-8 m-3 reserv_cancel disabled' type='button' data-bs-toggle='modal' data-bs-target='#reservStatusModal'><i class='fas fa-ban'></i><br>Cancel Reservation</button>";                
                    }
                echo "</td>";
                echo "</tr>";
            }
            echo " </tbody>";
        echo "</table>";
        echo "</div>";
        // Add Passenger Modal

        echo '<div class="modal fade" id="addPassengersModal" tabindex="-1" aria-labelledby="addPassengersModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title" id="addPassengersModalLabel">Include Passengers</h5>';
            echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            echo '<div class="container-fluid">';
            echo '<div class="row justify-content-center">';
            echo '<div class="col-xl-12 col-md-8">';

            echo '<form class="rounded shadow-5-strong m-5 needs-validation passenger-form" action="createpassenger" method="POST" id="passenger-form">';
            echo '<input type="text" id="passengers_reserv_id" name="passengers_reserv_id" readonly hidden>';
            echo '<input type="text" id="passengers_users_id" name="passengers_users_id" readonly hidden>';
            echo '<input type="text" id="passengers_flight_id" name="passengers_flight_id" readonly hidden>';
            echo '<input type="text" id="passengers_flight_type" name="passengers_flight_type" readonly hidden>';
            echo '<input type="text" id="passengers_available_flight_seats" name="passengers_available_flight_seats" readonly hidden>';
            echo '<input type="text" id="passengers_reserved_flight_seats" name="passengers_reserved_flight_seats" id="passengers_reserved_flight_seats" readonly value="0" hidden>';
            echo '</form>';
            echo '<p class="col text-center" id="reserv_flight_seats_error"></p>';
            echo "<button class='btn col-12 btn-outline-success mb-3' type='button' id='add-passenger-button'><i class='fas fa-user-plus'></i> Add Passenger</i></button>";
            echo "<button class='btn col-12 btn-outline-danger disabled mb-3' type='button' id='remove-passenger-button'><i class='fas fa-user-minus'></i> Remove Passenger</i></button>";

            echo '</div></div></div></div>';
            echo '<div class="modal-footer d-flex justify-content-between">';
            echo '<button type="button" class="btn btn-outline-secondary col-sm-5" data-bs-dismiss="modal">Cancel</button>';
            echo '<button type="submit" form="passenger-form" class="btn btn-outline-primary col-sm-5 disabled" id="confirm_passengers">Confirm</button>';
            echo '</div></div></div></div>';
        // Cancel Confirmation Modal
        echo '<div class="modal fade" id="reservStatusModal" tabindex="-1" aria-labelledby="reservStatusLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-dialog-centered">';
                echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="reservStatusLabel">Cancel Reservation</h5>';
                        echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body text-center">';
                    echo '<form action="updatereserv" class="update-form" id="update-form" method="POST">';                         
                            echo '<input type="text" id="update_users_id" name="update_users_id" readonly hidden>';
                            echo '<input type="text" id="update_flight_id" name="update_flight_id" readonly hidden>';
                            echo '<input type="text" id="update_reserv_status" name="update_reserv_status" readonly value="Cancelled" hidden>';
                            echo '<input type="text" id="update_reserv_seats" name="update_reserv_seats" readonly hidden>';
                        echo 'Are you sure you wanna cancel this flight ?';
                    echo '</div>';
                    echo '<div class="modal-footer d-flex justify-content-between">';
                        echo '<button type="button" class="btn btn-outline-primary col-sm-5" data-bs-dismiss="modal">No</button>';
                        echo '<button type="submit" form="update-form" class="btn btn-outline-danger col-sm-5">Yes</button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
?>