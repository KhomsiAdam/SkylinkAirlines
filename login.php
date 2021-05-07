<?php
require 'app/core/autoloader.php';

$user_obj = new UserController();
$user_obj->loginUser();