var create_flight_form = document.getElementById('create-flight-form');
var create_flight_submit = document.getElementById('create-flight-submit');

var flight_type = document.getElementById('flight-type');
var flight_return = document.getElementById('flight-return');
var flight_return_time = document.getElementById('flight-return-time');

var flight_origin = document.getElementById('flight-origin');
var flight_destination = document.getElementById('flight-destination');
var flight_departure_time = document.getElementById('flight-departure-time');
var flight_price = document.getElementById('flight-price');
var flight_seats = document.getElementById('flight-seats');


create_flight_submit.addEventListener('click', function(event) {
    event.preventDefault();
    if (flight_type.value === '' || flight_origin.value === '' || flight_destination.value === '' || flight_departure_time.value === '' || flight_price.value === '' || flight_seats.value === '') {
        document.getElementById('create-error').innerHTML = 'Please fill all the fields';
    } else {
        create_flight_form.submit();
    }
})