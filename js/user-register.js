var register_form = document.getElementById('register-form');
var register_submit = document.getElementById('register-submit');
var firstname = document.getElementById('firstname');
var lastname = document.getElementById('lastname');
var email = document.getElementById('email');
var pwd = document.getElementById('password');
var dob = document.getElementById('dob');
var country = document.getElementById('country');
// Empty inputs validation for register form
register_submit.addEventListener('click', function(event) {
    event.preventDefault();
    if (firstname.value === '' || lastname.value === '' || email.value === '' || pwd.value === '' || dob.value === '' || country.value === '') {
        document.getElementById('register-error').innerHTML = 'Please fill all the fields';
    } else {
        register_form.submit();
    }
})