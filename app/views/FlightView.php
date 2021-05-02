<?php
class FlightView extends FlightModel
{
    // Show all flights in the table
    public function showFlights()
    {
        $results = $this->getFlights();
        // Shows Table with all the Flights into HTML for admin
        echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-striped' id='flight-list'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class='text-center'>Information</th>";
                        echo "<th class='text-center'>Id</th>";
                        echo "<th class='text-center'>Seats</th>";
                        echo "<th class='text-center'>Price</th>";
                        echo "<th class='text-center'>Action</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($results as $result) {
                    if ($result['flight_type'] === 'Round Trip') {
                        echo "<tr>";
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
                                        echo "<p><i class='fas fa-plane-departure'></i> <small>Departure :<b>";
                                            echo date('M d Y h:i A', strtotime($result['flight_departure_time']));
                                        echo "</small></b></p>";
                                        echo "<p id='hidden_departure_time'>";
                                            echo date('Y-m-d', strtotime($result['flight_departure_time'])) . 'T' . date('h:i', strtotime($result['flight_departure_time']));
                                        echo "</p>";
                                        echo "<p><i class='fas fa-plane-departure fa-flip-horizontal'></i> <small>Return :<b>";
                                            echo date('M d Y h:i A', strtotime($result['flight_return_time']));
                                        echo "</small></b></p>";
                                        echo "<p id='hidden_return_time'>";
                                            echo date('Y-m-d', strtotime($result['flight_return_time'])) . 'T' . date('h:i', strtotime($result['flight_return_time']));
                                        echo "</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</td>";

                            echo "<td class='text-right'>";
                                echo $result['flight_id'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_seats'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_price'];
                            echo "</td>";
                            echo "<td class='text-center'>";
                                echo "<button class='btn btn-outline-primary btn-sm edit_flight' type='button' data-bs-toggle='modal' data-bs-target='#editModal'>Edit Flight <i class='fas fa-edit'></i></button>";
                                echo "<button class='btn btn-outline-danger btn-sm delete_flight' type='button' data-bs-toggle='modal' data-bs-target='#deleteModal'>Delete Flight <i class='fas fa-trash'></i></button>";
                            echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr>";
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
                                        echo "<p><i class='fas fa-plane-departure'></i> <small>Departure :<b>";
                                            echo date('M d Y h:i A', strtotime($result['flight_departure_time']));
                                        echo "</small></b></p>";
                                        echo "<p id='hidden_departure_time_2'>";
                                            echo date('Y-m-d', strtotime($result['flight_departure_time'])) . 'T' . date('h:i', strtotime($result['flight_departure_time']));
                                        echo "</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_id'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_seats'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_price'];
                            echo "</td>";
                            echo "<td class='text-center'>";
                                echo "<button class='btn btn-outline-primary btn-sm edit_flight' type='button' data-bs-toggle='modal' data-bs-target='#editModal'>Edit Flight <i class='fas fa-edit'></i></button>";
                                echo "<button class='btn btn-outline-danger btn-sm delete_flight' type='button' data-bs-toggle='modal' data-bs-target='#deleteModal'>Delete Flight <i class='fas fa-trash'></i></button>";
                            echo "</td>";
                        echo "</tr>";
                    } // if else end
                }// foreach end
                echo " </tbody>";
            echo "</table>";
        echo "</div>";
        // Delete Confirmation Modal
        echo '<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-dialog-centered">';
                echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                        echo '<form action="deleteflight.php" class="delete-form" id="delete-form" method="POST">';
                            echo '<input type="text" id="delete_flight_id" name="delete_flight_id" readonly>';
                        echo '</form>';
                        echo 'Are you sure you wanna delete this flight ?';
                    echo '</div>';
                    echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
                        echo '<button type="submit" form="delete-form" class="btn btn-primary">Confirm</button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        // Edit Confirmation Modal
        echo '<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog">';
                echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="editModalLabel">Confirmation</h5>';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                echo '<div class="modal-body">';
                    echo '<div class="container-fluid">';
                        echo '<div class="row justify-content-center">';
                            echo '<div class="col-xl-12 col-md-8">';
                                echo '<form class="bg-white rounded shadow-5-strong p-5 needs-validation" action="updateflight.php" method="POST" id="edit-flight-form">';
                                    echo '<input type="text" id="edit_flight_id" name="edit_flight_id" readonly>';
                                    echo '<div class="form-group form-outline mb-4">';
                                        echo '<label for="edit-flight-type" class="form-label">Flight Type</label>';
                                        echo '<select name="edit-flight-type" id="edit-flight-type" class="form-control">';
                                            echo '<option value="" selected> -- select an option -- </option>';
                                            echo '<option value="One Way">One Way</option>';
                                            echo '<option value="Round Trip">Round Trip</option>';
                                        echo '</select>';
                                    echo '</div>';
                                    echo '<div class="form-group form-outline mb-4">';
                                        echo '<label for="edit-flight-origin" class="form-label">Flight Origin</label>';
                                        echo '<input type="text" name="edit-flight-origin" id="edit-flight-origin" class="form-control">';
                                    echo '</div>';
                                    echo '<div class="form-group form-outline mb-4">';
                                        echo '<label for="edit-flight-destination" class="form-label">Flight Destination</label>';
                                        echo '<input type="text" name="edit-flight-destination" id="edit-flight-destination" class="form-control">';
                                    echo '</div>';
                                    echo '<div class="form-group form-outline mb-4">';
                                        echo '<label for="edit-flight-departure-time" class="form-label">Flight Departure Time</label>';
                                        echo '<input type="datetime-local" name="edit-flight-departure-time" id="edit-flight-departure-time" class="form-control">';
                                    echo '</div>';
                                    echo '<div class="form-group form-outline mb-4" id="edit-flight-return">';
                                        echo '<label for="edit-flight-return-time" class="form-label">Flight Return Time</label>';
                                        echo '<input type="datetime-local" name="edit-flight-return-time" id="edit-flight-return-time" class="form-control">';
                                    echo '</div>';
                                    echo '<div class="form-group form-outline mb-4">';
                                        echo '<label for="edit-flight-price" class="form-label">Price</label>';
                                        echo '<input type="number" name="edit-flight-price" id="edit-flight-price" class="form-control">';
                                    echo '</div>';
                                    echo '<div class="form-group form-outline mb-4">';
                                        echo '<label for="edit-flight-seats" class="form-label">Seats</label>';
                                        echo '<input type="number" name="edit-flight-seats" id="edit-flight-seats" class="form-control">';
                                    echo '</div>';
                                    echo '<div class="col text-center">';
                                        echo '<p class="edit-error" id="edit-error">';
                                        echo '</p>';
                                    echo '</div>';
                                echo '</form>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="modal-footer">';
                    echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>';
                    echo '<button type="submit" form="edit-flight-form" id="edit-flight-submit" class="btn btn-primary">Confirm</button>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    public function showUserFlights()
    {
        $results = $this->getFlights();
        // Shows Table with all the Flights into HTML for users
        echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-striped' id='flight-list'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class='text-center'>Information</th>";
                        echo "<th class='text-center'>Id</th>";
                        echo "<th class='text-center'>Seats</th>";
                        echo "<th class='text-center'>Price</th>";
                        echo "<th class='text-center'>Action</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($results as $result) {
                    if ($result['flight_type'] === 'Round Trip') {
                        echo "<tr>";
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
                                        echo "<p><i class='fas fa-plane-departure'></i> <small>Departure :<b>";
                                            echo date('M d Y h:i A', strtotime($result['flight_departure_time']));
                                        echo "</small></b></p>";
                                        echo "<p id='hidden_departure_time'>";
                                            echo date('Y-m-d', strtotime($result['flight_departure_time'])) . 'T' . date('h:i', strtotime($result['flight_departure_time']));
                                        echo "</p>";
                                        echo "<p><i class='fas fa-plane-departure fa-flip-horizontal'></i> <small>Return :<b>";
                                            echo date('M d Y h:i A', strtotime($result['flight_return_time']));
                                        echo "</small></b></p>";
                                        echo "<p id='hidden_return_time'>";
                                            echo date('Y-m-d', strtotime($result['flight_return_time'])) . 'T' . date('h:i', strtotime($result['flight_return_time']));
                                        echo "</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_id'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_seats'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_price'];
                            echo "</td>";
                            echo "<td class='text-center'>";
                                echo "<button class='btn btn-outline-primary btn-sm reserv_flight' type='button' data-bs-toggle='modal' data-bs-target='#reservModal'>Book Flight <i class='fas fa-ticket-alt'></i></button>";
                            echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr>";
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
                                        echo "<p><i class='fas fa-plane-departure'></i> <small>Departure :<b>";
                                            echo date('M d Y h:i A', strtotime($result['flight_departure_time']));
                                        echo "</small></b></p>";
                                        echo "<p id='hidden_departure_time_2'>";
                                            echo date('Y-m-d', strtotime($result['flight_departure_time'])) . 'T' . date('h:i', strtotime($result['flight_departure_time']));
                                        echo "</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_id'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_seats'];
                            echo "</td>";
                            echo "<td class='text-right'>";
                                echo $result['flight_price'];
                            echo "</td>";
                            echo "<td class='text-center'>";
                                echo "<button class='btn btn-outline-primary btn-sm reserv_flight' type='button' data-bs-toggle='modal' data-bs-target='#reservModal'>Book Flight <i class='fas fa-ticket-alt'></i></button>";
                            echo "</td>";
                        echo "</tr>";
                    } // if else end
                } // forseach end
                echo " </tbody>";
            echo "</table>";
        echo "</div>";
    }
}
?>