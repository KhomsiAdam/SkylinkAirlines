// Select all current reserv buttons
var reserv_buttons = document.querySelectorAll('.reserv_flight');
// Going through all the current existing reserv buttons to get informations through parentelements depending on which button is pressed
for (i = 0; i < reserv_buttons.length; i++) {
    reserv_buttons[i].addEventListener('click', getReservButton);
}

var reserv;
function getReservButton() {
    reserv = this.parentElement.parentElement;
    getReservInfo(reserv);
}

var reserv_flight_id = document.getElementById('reserv_flight_id');
var flight_type = document.getElementById('flight_type');
var flight_origin = document.getElementById('flight_origin');
var flight_destination = document.getElementById('flight_destination');
var flight_departure_time = document.getElementById('flight_departure_time');
var flight_return_time = document.getElementById('flight_return_time');
var reserv_flight_seats = document.getElementById('reserv_flight_seats');

function getReservInfo(reserv) {
    reserv_flight_id.value = reserv.children[1].innerHTML;
    flight_type.value = reserv.children[0].children[0].children[0].children[0].children[0].innerHTML;
    flight_origin.value = reserv.children[0].children[0].children[0].children[1].children[0].children[0].innerHTML;
    flight_destination.value = reserv.children[0].children[0].children[0].children[2].children[0].children[0].innerHTML;
    flight_departure_time.value = reserv.children[0].children[0].children[0].children[4].innerHTML;
    // Get the return time only if the flight is a Round Trip
    if (flight_type.value == 'Round Trip') {
        flight_return_time.value = reserv.children[0].children[0].children[0].children[6].innerHTML;
    } else {
        flight_return_time.value = '';
    }
    reserv_flight_seats.value = reserv.children[2].innerHTML;
}
// Display alert in flights page of Users when either a flight is already booked or seats are not available
var reserv_error = document.getElementById('reserv-error');
var reserv_alert = document.getElementById('reserv-alert');

if (reserv_error.innerText !== '') {
    reserv_alert.style.display = "block";
} else if (reserv_error.innerText === '') {
    reserv_alert.style.display = "none";
}