const search_input = document.getElementById('search');

function searchFunction() {
let filter, table, ptable, tr, ptr, td, ptd, i, txtValue;
filter = search_input.value.toUpperCase();
table = document.getElementById("reserv-list");
ptable = document.getElementById("passengers-list");
tr = table.getElementsByTagName("tr");
ptr = ptable.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    for (i = 0; i < ptr.length; i++) {
        ptd = ptr[i].getElementsByTagName("td")[2];
        if (ptd) {
            txtValue = ptd.textContent || ptd.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                ptr[i].style.display = "";
            } else {
                ptr[i].style.display = "none";
            }
        }
    }
}