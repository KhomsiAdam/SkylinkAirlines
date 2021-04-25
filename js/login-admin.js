var login_form = document.getElementById('login-form');
var login_submit = document.getElementById('login-submit');
var username = document.getElementById('username');
var pwd = document.getElementById('password');

login_submit.addEventListener('click', function(event) {
    event.preventDefault();
    if ( username.value === '' || pwd.value === '' ) {
        document.getElementById('login-error').innerHTML = 'Please fill all the fields';
    } else {
        login_form.submit();
    }
})