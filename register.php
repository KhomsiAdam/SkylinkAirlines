<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$date_of_birth = $_POST['dob'];
$country = $_POST['country'];

$register_user_obj = new UserController();
$register_user_obj->registerUser($first, $last, $email, password_hash($password, PASSWORD_BCRYPT), $date_of_birth, $country);
?>