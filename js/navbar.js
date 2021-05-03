// Make navbar link active if it's the current page
const currentLocation = location.href;
const navLinks = document.querySelectorAll('a');
const navLenght = navLinks.length;
for (let i = 0; i < navLenght; i++) {
    if (navLinks[i].href === currentLocation) {
        navLinks[i].classList.add("active");
        navLinks[i].setAttribute("aria-current", "page"); 
    }
}