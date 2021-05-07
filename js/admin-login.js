var admin_login_form = document.getElementById('admin-login-form');
var login_submit = document.getElementById('login-submit');
var username = document.getElementById('username');
var pwd = document.getElementById('password');
// Empty inputs validation for admin login form
login_submit.addEventListener('click', function(event) {
    event.preventDefault();
    if ( username.value === '' || pwd.value === '' ) {
        document.getElementById('login-error').innerHTML = 'Please fill all the fields';
    } else {
        admin_login_form.submit();
    }
})