var create_flight_form = document.getElementById('create-flight-form');
var create_flight_submit = document.getElementById('create-flight-submit');
var flight_type = document.getElementById('flight-type');
var flight_return = document.getElementById('flight-return');
var flight_return_time = document.getElementById('flight-return-time');
var flight_origin = document.getElementById('autocomplete');
var flight_destination = document.getElementById('autocomplete2');
var flight_departure_time = document.getElementById('flight-departure-time');
var flight_price = document.getElementById('flight-price');
var flight_seats = document.getElementById('flight-seats');
// Empty inputs validation for add flights form
create_flight_submit.addEventListener('click', function(event) {
    event.preventDefault();
    if (flight_type.value === '' || flight_origin.value === '' || flight_destination.value === '' || flight_departure_time.value === '' || flight_price.value === '' || flight_seats.value === '') {
        document.getElementById('create-error').innerHTML = 'Please fill all the fields';
    } else {
        create_flight_form.submit();
    }
});
// Hide or Show return date/time of flight depending on flight type
flight_type.addEventListener('change', function(){
    console.log(flight_type.value);
    if (flight_type.value == 'Round Trip') {
        flight_return.style.display = "block";
    } else {
        flight_return.style.display = "none";
        flight_return_time.value = null;
    }
});