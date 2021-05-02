function datechange(){
    var date = document.getElementById('flight-return-time').value;
    console.log(date);
}

var flight_type = document.getElementById('flight-type');
var flight_return = document.getElementById('flight-return');
var flight_return_time = document.getElementById('flight-return-time');

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
// EventListener Loop to go through all the current existing expand buttons to show the unique details for each individual product depending on which expand button is pressed
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

// Select all current delete buttons
var edit_buttons = document.querySelectorAll('.edit_flight');
// EventListener Loop to go through all the current existing expand buttons to show the unique details for each individual product depending on which expand button is pressed
for(i=0 ; i < edit_buttons.length ; i++) {
    edit_buttons[i].addEventListener('click', getEditId);
}

function getEditId(){
    flight=this.parentElement.parentElement;
    confirmEdit(flight);
    /* if (edit_flight_type.value == 'Round Trip') {
        edit_flight_return.style.display = "block";
    } else {
        edit_flight_return.style.display = "none";
    } */
}

function confirmEdit(flight) {
    document.getElementById('edit_flight_id').value=flight.children[1].innerHTML;

    edit_flight_type.value=flight.children[0].children[0].children[0].children[0].children[0].innerHTML;

    edit_flight_origin.value=flight.children[0].children[0].children[0].children[1].children[0].children[0].innerHTML;
    edit_flight_destination.value=flight.children[0].children[0].children[0].children[2].children[0].children[0].innerHTML;
    
    edit_flight_price.value=flight.children[3].innerHTML;
    edit_flight_seats.value=flight.children[2].innerHTML;

    edit_flight_departure_time.value=flight.children[0].children[0].children[0].children[4].innerHTML;
    if (edit_flight_type.value == 'Round Trip') {
        edit_flight_return.style.display = "block";
        edit_flight_return_time.value=flight.children[0].children[0].children[0].children[6].innerHTML;    
    } else {
        edit_flight_return.style.display = "none";
    }
}

var create_flight_form = document.getElementById('create-flight-form');
var create_flight_submit = document.getElementById('create-flight-submit');

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

var edit_flight_form = document.getElementById('edit-flight-form');
var edit_flight_submit = document.getElementById('edit-flight-submit');

var edit_flight_origin = document.getElementById('edit-flight-origin');
var edit_flight_destination = document.getElementById('edit-flight-destination');
var edit_flight_departure_time = document.getElementById('edit-flight-departure-time');
var edit_flight_price = document.getElementById('edit-flight-price');
var edit_flight_seats = document.getElementById('edit-flight-seats');


edit_flight_submit.addEventListener('click', function(event) {
    event.preventDefault();
    if (edit_flight_type.value === '' || edit_flight_origin.value === '' || edit_flight_destination.value === '' || edit_flight_departure_time.value === '' || edit_flight_price.value === '' || edit_flight_seats.value === '') {
        document.getElementById('edit-error').innerHTML = 'Please fill all the fields';
    } else {
        edit_flight_form.submit();
    }
})

function Print() {
    var docprint = window.open("about:blank", "_blank"); 
    var oTable = document.getElementById("flight-list").rows.item(0);
    docprint.document.open(); 
    docprint.document.write('<html><head><title>' + document.title + '</title>'); 
    docprint.document.write('</head><body><center>');
    docprint.document.write(oTable.innerHTML);
    docprint.document.write('</center></body></html>'); 
    docprint.document.close(); 
    docprint.print();
    docprint.close();
}