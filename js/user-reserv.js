/* Cancel Reservations */
// Select all current cancel buttons
var cancel_buttons = document.querySelectorAll('.reserv_cancel');
// Loop through all the current existing cancel buttons
for (i = 0; i < cancel_buttons.length; i++) {
    cancel_buttons[i].addEventListener('click', getReservId);
}
// Get to the parent of the parent of the cancel button
function getReservId() {
    reserv = this.parentElement.parentElement;
    confirmCancel(reserv);
}
// Get needed information and put it into the cancel form
function confirmCancel(reserv) {
    document.getElementById('update_users_id').value = reserv.children[1].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('update_flight_id').value = reserv.children[3].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('update_reserv_seats').value = reserv.children[5].innerHTML;
}

/* Managing Passenger form : add, remove */
var add_passenger_button = document.getElementById('add-passenger-button');
var remove_passenger = document.getElementById('remove-passenger-button');
var passenger_form = document.getElementById('passenger-form');
var confirm_passengers = document.getElementById('confirm_passengers');
var reserv_flight_seats;
var total_seats_left;
var reserv_flight_seats_error = document.getElementById('reserv_flight_seats_error');
var passengers_reserved_flight_seats = document.getElementById('passengers_reserved_flight_seats');
// Select all current passengers buttons
var passengers_buttons = document.querySelectorAll('.reserv_passenger');
// Loop to go through all the current existing passenger buttons
for (i = 0; i < passengers_buttons.length; i++) {
    passengers_buttons[i].addEventListener('click', getPassengerButton);
}

function getPassengerButton() {
    passenger = this.parentElement.parentElement;
    confirmAddPassenger(passenger);
    getFlightSeats(passenger);
}

function confirmAddPassenger(passenger) {
    document.getElementById('passengers_reserv_id').value = passenger.children[0].innerHTML;
    document.getElementById('passengers_users_id').value = passenger.children[1].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('passengers_flight_id').value = passenger.children[3].children[0].children[0].children[0].children[0].innerHTML;
    document.getElementById('passengers_flight_type').value = passenger.children[3].children[0].children[0].children[2].children[0].innerHTML;
    document.getElementById('passengers_available_flight_seats').value = passenger.children[3].children[0].children[0].children[1].children[0].innerHTML;
}

function getFlightSeats(passenger) {
    total_seats_left = passenger.children[3].children[0].children[0].children[1].children[0].innerHTML;
    reserv_flight_seats = passenger.children[3].children[0].children[0].children[1].children[0].innerHTML;
}

// Create inputs for each passenger added
add_passenger_button.addEventListener('click', createPassengerInputs);
function createPassengerInputs() {
    // Only add passenger if a seat is available
    if (reserv_flight_seats != 0) {
        // Add to reserved seats
        passengers_reserved_flight_seats.value = parseInt(passengers_reserved_flight_seats.value) + 1;
        // Create Title
        let passenger_title = document.createElement("P");
        passenger_title.setAttribute("class", 'col text-center');
        passenger_title.innerHTML = 'Passenger' + ' ' + passengers_reserved_flight_seats.value;
        passenger_form.appendChild(passenger_title);
        // Create the Firstname Input Text
        let firstname_input = document.createElement("INPUT");
        firstname_input.setAttribute("type", "text");
        firstname_input.setAttribute("name", 'passengers_firstname[]');
        firstname_input.setAttribute("class", 'passengers_firstname form-control mb-4 col-md-6');
        firstname_input.setAttribute("placeholder", 'Firstname');
        passenger_form.appendChild(firstname_input);
        // Create the Lastname Input Text
        let lastname_input = document.createElement("INPUT");
        lastname_input.setAttribute("type", "text");
        lastname_input.setAttribute("name", 'passengers_lastname[]');
        lastname_input.setAttribute("class", 'passengers_lastname form-control mb-4');
        lastname_input.setAttribute("placeholder", 'Lastname');
        passenger_form.appendChild(lastname_input);
        // Create the Date of birth Input Date
        let dateofbirth_input = document.createElement("INPUT");
        dateofbirth_input.setAttribute("type", "date");
        dateofbirth_input.setAttribute("name", 'passengers_dateofbirth[]');
        dateofbirth_input.setAttribute("class", 'passengers_dateofbirth form-control mb-4');
        dateofbirth_input.setAttribute("placeholder", 'Date of birth');
        passenger_form.appendChild(dateofbirth_input);
        // Create the Country Input Text
        let country_input = document.createElement("INPUT");
        country_input.setAttribute("type", "text");
        country_input.setAttribute("name", 'passengers_country[]');
        country_input.setAttribute("class", 'passengers_country form-control mb-4');
        country_input.setAttribute("placeholder", 'Country');
        passenger_form.appendChild(country_input);
        // Substract from seats available
        reserv_flight_seats--;
        // Enable the remove passengers and confirm button
        remove_passenger.classList.remove("disabled");
        confirm_passengers.classList.remove("disabled");
    } else {
        reserv_flight_seats_error.innerHTML = "You can't add anymore passenger because there is no more available seat"
    }
}

// Remove last added inputs of passengers
remove_passenger.addEventListener('click', removePassenger);
function removePassenger() {
    for (let i = 1; i <= 5; i++) {
        passenger_form.lastElementChild.remove();
    }
    // Add to seats available
    reserv_flight_seats++;
    // Substract from reserved seats
    passengers_reserved_flight_seats.value = parseInt(passengers_reserved_flight_seats.value) - 1;
    // Clear the error message if seats are available
    if (reserv_flight_seats != 0) {
        reserv_flight_seats_error.innerHTML = "";
    }
    // Disable the remove passengers and confirm button
    if (reserv_flight_seats == total_seats_left) {
        remove_passenger.classList.add("disabled");
        confirm_passengers.classList.add("disabled");
    }
}

var passengers_firstname = document.querySelectorAll('.passengers_firstname');
var passengers_lastname = document.querySelectorAll('.passengers_lastname');
var passengers_dateofbirth = document.querySelectorAll('.passengers_dateofbirth');
var passengers_country = document.querySelectorAll('.passengers_country');
var elements = passenger_form.elements;

// Empty inputs validation for add passenger form
confirm_passengers.addEventListener('click', function (event) {
    event.preventDefault();
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" || element.type === "date") {
            if (element.value === "") {
                reserv_flight_seats_error.innerHTML = "Please fill all the fields"
                break;
            }
        } else {
            passenger_form.submit();
        }
    }
})

// TODO: Printing Testing
// function Print() {
//     var docprint = window.open("about:blank", "_blank"); 
//     var table = document.getElementById("reserv-list").rows[0];
//     /* var table = document.getElementById("reserv-list").rows.item(0); */
//     docprint.document.open(); 
//     docprint.document.write('<thead><head><title>' + document.title + '</title>'); 
//     docprint.document.write('</head><body><center>');
//     /* docprint.document.write('<html><head><title>' + document.title + '</title>'); 
//     docprint.document.write('</head><body><center>'); */
//     docprint.document.write(table.innerHTML);
//     docprint.document.write('</center></body></html>'); 
//     docprint.document.close(); 
//     docprint.print();
//     docprint.close();
// }
// function print() {
//     var docprint = window.open("about:blank", "_blank");
//     var oTable = document.getElementById("reserv-list").rows.item(1);
//     docprint.document.open(); 
//     docprint.document.write('<html><head><link rel="stylesheet" href="css/custom.css"><link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.css"><link rel="icon" href="icons/favicon.ico"><title>Skylink Airlines</title><script src="node_modules/bootstrap/dist/js/bootstrap.js" defer></script></head><body>');
//     docprint.document.write(oTable.innerHTML);
//     docprint.document.write('</body></html>');
//     docprint.document.close(); 
//     docprint.print();
//     docprint.focus();
//     docprint.close();
// }
// Select all current print buttons
var print_buttons = document.querySelectorAll('.reserv_print');
// EventListener Loop to go through all the current existing print buttons
for (i = 0; i < print_buttons.length; i++) {
    print_buttons[i].addEventListener('click', getPrintButtons);
}

function getPrintButtons() {
    docprint = this.parentElement.parentElement;
    getPrintTicket(docprint);
}

function getPrintTicket(docprint) {
    // docprint.children[0].classList.add("print-container");
    // docprint.children[1].classList.add("print-container");
    // docprint.children[2].classList.add("print-container");
    // docprint.children[3].classList.add("print-container");
    // docprint.children[4].classList.add("print-container");
    // docprint.children[5].classList.add("print-container");
    // window.print();
    // docprint.children[0].classList.remove("print-container");
    // docprint.children[1].classList.remove("print-container");
    // docprint.children[2].classList.remove("print-container");
    // docprint.children[3].classList.remove("print-container");
    // docprint.children[4].classList.remove("print-container");
    // docprint.children[5].classList.remove("print-container");
    var print = window.open("about:blank", "_blank");
    print.document.open(); 
    print.document.write('<html><head><link rel="stylesheet" href="css/custom.css"><link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.css"><link rel="icon" href="icons/favicon.ico"><title>Skylink Airlines</title></head><body>');
    print.document.write('<table class"table table-bordered" id="reserv-list"><thead><tr><th class="text-center">Id</th><th class="text-center">User Informations</th><th class="text-center">Added Passengers</th><th class="text-center">Flight Informations</th><th class="text-center">Status</th><th class="text-center">Reserved seats</th></tr></thead>');
    print.document.write('<tbody>');
    print.document.write(docprint.children[0].innerHTML);
    print.document.write(docprint.children[1].innerHTML);
    print.document.write(docprint.children[2].innerHTML);
    print.document.write(docprint.children[3].innerHTML);
    print.document.write(docprint.children[4].innerHTML);
    print.document.write(docprint.children[5].innerHTML);
    print.document.write('</tbody>');
    print.document.write('</table></body></html>');
    print.document.close(); 
    print.print();
    print.close();
}