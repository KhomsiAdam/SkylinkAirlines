var flight_type = document.getElementById('flight-type');
var flight_return = document.getElementById('flight-return');
var flight_return_time = document.getElementById('flight-return-time');
// Hide or Show the input date/time for returning depending on flight type in the add form
flight_type.addEventListener('change', function(){
    console.log(flight_type.value);
    if (flight_type.value == 'Round Trip') {
        flight_return.style.display = "block";
    } else {
        flight_return.style.display = "none";
        flight_return_time.value = null;
    }
});

var edit_flight_type = document.getElementById('edit-flight-type');
var edit_flight_return = document.getElementById('edit-flight-return');
var edit_flight_return_time = document.getElementById('edit-flight-return-time');
// Hide or Show the input date/time for returning depending on flight type in the edit form
edit_flight_type.addEventListener('change', function(){
    console.log(edit_flight_type.value);
    if (edit_flight_type.value == 'Round Trip') {
        edit_flight_return.style.display = "block";
    } else {
        edit_flight_return.style.display = "none";
        edit_flight_return_time.value = null;
    }
});

// Select all current delete buttons
var delete_buttons = document.querySelectorAll('.delete_flight');
// Go through all the current existing delete buttons
for(i=0 ; i < delete_buttons.length ; i++) {
    delete_buttons[i].addEventListener('click', getDeleteId);
}
var flight;
function getDeleteId(){
    flight=this.parentElement.parentElement;
    confirmDelete(flight);
}

function confirmDelete(flight) {
    document.getElementById('delete_flight_id').value=flight.children[1].innerHTML;
}

// Select all current edit buttons
var edit_buttons = document.querySelectorAll('.edit_flight');
// Go through all the current existing edit buttons
for(i=0 ; i < edit_buttons.length ; i++) {
    edit_buttons[i].addEventListener('click', getEditId);
}

function getEditId(){
    flight=this.parentElement.parentElement;
    confirmEdit(flight);
}

function confirmEdit(flight) {
    document.getElementById('edit_flight_id').value=flight.children[1].innerHTML;

    edit_flight_type.value=flight.children[0].children[0].children[0].children[0].children[0].innerHTML;

    edit_flight_origin.value=flight.children[0].children[0].children[0].children[1].children[0].children[0].innerHTML;
    edit_flight_destination.value=flight.children[0].children[0].children[0].children[2].children[0].children[0].innerHTML;
    
    edit_flight_price.value=flight.children[3].children[0].children[0].innerHTML;
    edit_flight_seats.value=flight.children[2].innerHTML;

    edit_flight_departure_time.value=flight.children[0].children[0].children[0].children[4].innerHTML;
    if (edit_flight_type.value == 'Round Trip') {
        edit_flight_return.style.display = "block";
        edit_flight_return_time.value=flight.children[0].children[0].children[0].children[6].innerHTML;    
    } else {
        edit_flight_return.style.display = "none";
    }
}

var edit_flight_form = document.getElementById('edit-flight-form');
var edit_flight_submit = document.getElementById('edit-flight-submit');
var edit_flight_origin = document.getElementById('edit-flight-origin');
var edit_flight_destination = document.getElementById('edit-flight-destination');
var edit_flight_departure_time = document.getElementById('edit-flight-departure-time');
var edit_flight_price = document.getElementById('edit-flight-price');
var edit_flight_seats = document.getElementById('edit-flight-seats');

// Empty inputs validation for the edit flight form
edit_flight_submit.addEventListener('click', function(event) {
    event.preventDefault();
    if (edit_flight_type.value === '' || edit_flight_origin.value === '' || edit_flight_destination.value === '' || edit_flight_departure_time.value === '' || edit_flight_price.value === '' || edit_flight_seats.value === '') {
        document.getElementById('edit-error').innerHTML = 'Please fill all the fields';
    } else {
        edit_flight_form.submit();
    }
})