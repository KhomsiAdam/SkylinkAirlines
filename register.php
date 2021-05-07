<?php
require 'app/core/autoloader.php';

$register_user_obj = new UserController();
$register_user_obj->registerUser($first, $last, $email, $password, $date_of_birth, $country);