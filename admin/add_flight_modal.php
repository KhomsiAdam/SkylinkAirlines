<!-- Add Flight Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add new flight</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-md-8">
                            <form class="bg-white rounded shadow-5-strong p-5 needs-validation" action="createflight" method="POST" id="create-flight-form">

                                <div class="form-group form-outline mb-4">
                                    <label for="flight-type" class="form-label">Flight Type</label>
                                    <select name="flight-type" id="flight-type" class="form-control">
                                        <option value="" selected>
                                            -- select an option --
                                        </option>
                                        <option value="One Way">One Way</option>
                                        <option value="Round Trip">Round Trip</option>
                                    </select>
                                </div>

                                <div class="form-group form-outline mb-4">
                                    <label for="flight-origin" class="form-label">Flight Origin</label>
                                    <input type="text" name="flight-origin" id="flight-origin" class="form-control">
                                </div>

                                <div class="form-group form-outline mb-4">
                                    <label for="flight-destination" class="form-label">Flight Destination</label>
                                    <input type="text" name="flight-destination" id="flight-destination" class="form-control">
                                </div>

                                <div class="form-group form-outline mb-4">
                                    <label for="flight-departure-time" class="form-label">Flight Departure Time</label>
                                    <input type="datetime-local" name="flight-departure-time" id="flight-departure-time" class="form-control">
                                </div>

                                <div class="form-group form-outline mb-4" id="flight-return">
                                    <label for="flight-return-time" class="form-label">Flight Return Time</label>
                                    <input type="datetime-local" name="flight-return-time" id="flight-return-time" class="form-control">
                                </div>

                                <div class="form-group form-outline mb-4">
                                    <label for="flight-price" class="form-label">Price</label>
                                    <input type="number" name="flight-price" id="flight-price" class="form-control">
                                </div>

                                <div class="form-group form-outline mb-4">
                                    <label for="flight-seats" class="form-label">Seats</label>
                                    <input type="number" name="flight-seats" id="flight-seats" class="form-control">
                                </div>

                                <div class="col text-center">
                                    <p class="create-error" id="create-error">
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="create-flight-form" id="create-flight-submit" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div> <!-- Add Flight Modal end -->