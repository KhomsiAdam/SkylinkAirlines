// Select all current delete buttons
var cancel_buttons = document.querySelectorAll('.reserv_cancel');
// EventListener Loop to go through all the current existing expand buttons to show the unique details for each individual product depending on which expand button is pressed
for(i=0 ; i < cancel_buttons.length ; i++) {
    cancel_buttons[i].addEventListener('click', getReservId);
}

function getReservId(){
    reserv=this.parentElement.parentElement;
    confirmEdit(reserv);
}

function confirmEdit(reserv) {
    document.getElementById('update_reserv_id').value = reserv.children[0].innerHTML;
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