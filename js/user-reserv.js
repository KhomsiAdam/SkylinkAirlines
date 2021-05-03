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
            firstname_input.setAttribute("class", 'passengers_firstname');
            firstname_input.setAttribute("placeholder", 'Firstname');
            passenger_form.appendChild(firstname_input);
            // Create the Lastname Input Text
            let lastname_input= document.createElement("INPUT");
            lastname_input.setAttribute("type", "text");
            lastname_input.setAttribute("name", 'passengers_lastname[]');
            lastname_input.setAttribute("class", 'passengers_lastname');
            lastname_input.setAttribute("placeholder", 'Lastname');
            passenger_form.appendChild(lastname_input);
            // Create the Date of birth Input Date
            let dateofbirth_input = document.createElement("INPUT");
            dateofbirth_input.setAttribute("type", "date");
            dateofbirth_input.setAttribute("name", 'passengers_dateofbirth[]');
            dateofbirth_input.setAttribute("class", 'passengers_dateofbirth');
            passenger_form.appendChild(dateofbirth_input);
            // Create the Country Input Text
            let country_input = document.createElement("INPUT");
            country_input.setAttribute("type", "text");
            country_input.setAttribute("name", 'passengers_country[]');
            country_input.setAttribute("class", 'passengers_country');
            country_input.setAttribute("placeholder", 'Country');
            passenger_form.appendChild(country_input);
            reserv_flight_seats--;
            passengers_reserved_flight_seats.value = parseInt(passengers_reserved_flight_seats.value) + 1;
            remove_passenger.classList.remove("disabled");
            confirm_passengers.classList.remove("disabled");
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
        confirm_passengers.classList.add("disabled");
    }
}

var confirm_passengers = document.getElementById('confirm_passengers');

var passengers_firstname = document.querySelectorAll('.passengers_firstname');
var passengers_lastname = document.querySelectorAll('.passengers_lastname');
var passengers_dateofbirth = document.querySelectorAll('.passengers_dateofbirth');
var passengers_country = document.querySelectorAll('.passengers_country');
var elements = passenger_form.elements;

// Empty inputs validation for add passenger form
confirm_passengers.addEventListener('click', function(event) {
    event.preventDefault();
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" || element.type === "date") {
            if (element.value === "") {
                break;
            }
        } else {
            passenger_form.submit();
        }
    }
})

// Printing Testing
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
for(i=0 ; i < print_buttons.length ; i++) {
    print_buttons[i].addEventListener('click', getPrintButtons);
}

function getPrintButtons(){
    docprint=this.parentElement.parentElement;
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
    print.document.write('<html><head><link rel="stylesheet" href="./css/custom.css"><link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.css"><link rel="icon" href="icons/favicon.ico"><title>Skylink Airlines</title></head><body>');
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