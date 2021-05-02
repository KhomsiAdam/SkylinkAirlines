// Select all current cancel buttons
var cancel_buttons = document.querySelectorAll('.reserv_cancel');
// EventListener Loop to go through all the current existing cancel buttons
for(i=0 ; i < cancel_buttons.length ; i++) {
    cancel_buttons[i].addEventListener('click', getReservId);
}

function getReservId(){
    reserv=this.parentElement.parentElement;
    confirmCancel(reserv);
}

function confirmCancel(reserv) {
    document.getElementById('update_users_id').value = reserv.children[1].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('update_flight_id').value = reserv.children[3].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('update_reserv_seats').value = reserv.children[5].innerHTML;
}

// Select all current add passenger buttons
var add_passenger_buttons = document.querySelectorAll('.reserv_passenger');
// EventListener Loop to go through all the current existing passenger buttons
for(i=0 ; i < add_passenger_buttons.length ; i++) {
    add_passenger_buttons[i].addEventListener('click', getPassengerReservId);
}

function getPassengerReservId(){
    passenger=this.parentElement.parentElement;
    confirmAddPassenger(passenger);
}

function confirmAddPassenger(passenger) {
    document.getElementById('passengers_reserv_id').value = passenger.children[0].innerHTML;
    document.getElementById('passengers_users_id').value = passenger.children[1].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('passengers_flight_id').value = passenger.children[3].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('passengers_flight_type').value = passenger.children[3].children[0].children[0].children[2].children[0].innerHTML;
    document.getElementById('passengers_available_flight_seats').value = passenger.children[3].children[0].children[0].children[1].children[0].innerHTML;
}

var add_passenger_button = document.getElementById('add-passenger-button');
var remove_passenger = document.getElementById('remove-passenger-button');
var passenger_form = document.getElementById('passenger-form');
var reserv_flight_seats;
var total_seats_left;
var reserv_flight_seats_error = document.getElementById('reserv_flight_seats_error');
var passengers_reserved_flight_seats = document.getElementById('passengers_reserved_flight_seats');


// Select all current passengers buttons
var passengers_buttons = document.querySelectorAll('.reserv_passenger');
// EventListener Loop to go through all the current existing cancel buttons
for(i=0 ; i < passengers_buttons.length ; i++) {
    passengers_buttons[i].addEventListener('click', getPassengerButton);
}

function getPassengerButton(){
    seats=this.parentElement.parentElement;
    getFlightSeats(seats);
}

function getFlightSeats(seats) {
    total_seats_left = seats.children[3].children[0].children[0].children[1].children[0].innerHTML;
    reserv_flight_seats = seats.children[3].children[0].children[0].children[1].children[0].innerHTML;
}

add_passenger_button.addEventListener('click', createPassengerInputs);

function createPassengerInputs() {
        if (reserv_flight_seats != 0) {
            // Create the Firstname Input Text
            let firstname_input = document.createElement("INPUT");
            firstname_input.setAttribute("type", "text");
            firstname_input.setAttribute("name", 'passengers_firstname[]');
            firstname_input.setAttribute("placeholder", 'Firstname');
            passenger_form.appendChild(firstname_input);
            // Create the Lastname Input Text
            let lastname_input= document.createElement("INPUT");
            lastname_input.setAttribute("type", "text");
            lastname_input.setAttribute("name", 'passengers_lastname[]');
            lastname_input.setAttribute("placeholder", 'Lastname');
            passenger_form.appendChild(lastname_input);
            // Create the Date of birth Input Date
            let dateofbirth_input = document.createElement("INPUT");
            dateofbirth_input.setAttribute("type", "date");
            dateofbirth_input.setAttribute("name", 'passengers_dateofbirth[]');
            passenger_form.appendChild(dateofbirth_input);
            // Create the Country Input Text
            let country_input = document.createElement("INPUT");
            country_input.setAttribute("type", "text");
            country_input.setAttribute("name", 'passengers_country[]');
            country_input.setAttribute("placeholder", 'Country');
            passenger_form.appendChild(country_input);
            reserv_flight_seats--;
            passengers_reserved_flight_seats.value = parseInt(passengers_reserved_flight_seats.value) + 1;
            remove_passenger.classList.remove("disabled");
        } else {
            reserv_flight_seats_error.innerHTML = "You can't add anymore passenger because there is no more available seat"
        }
}

remove_passenger.addEventListener('click', removePassenger);

function removePassenger() {
    passenger_form.lastElementChild.remove();
    passenger_form.lastElementChild.remove();
    passenger_form.lastElementChild.remove();
    passenger_form.lastElementChild.remove();
    reserv_flight_seats++;
    passengers_reserved_flight_seats.value = parseInt(passengers_reserved_flight_seats.value) - 1;
    if (reserv_flight_seats != 0) {
        reserv_flight_seats_error.innerHTML = "";
    }
    if (reserv_flight_seats == total_seats_left) {
        remove_passenger.classList.add("disabled");
    }
}

// Print all the page
function Print() {
    var docprint = window.open("about:blank", "_blank"); 
    var table = document.getElementById("reserv-list").rows[0];
    /* var table = document.getElementById("reserv-list").rows.item(0); */
    docprint.document.open(); 
    docprint.document.write('<thead><head><title>' + document.title + '</title>'); 
    docprint.document.write('</head><body><center>');
    /* docprint.document.write('<html><head><title>' + document.title + '</title>'); 
    docprint.document.write('</head><body><center>'); */
    docprint.document.write(table.innerHTML);
    docprint.document.write('</center></body></html>'); 
    docprint.document.close(); 
    docprint.print();
    docprint.close();
}