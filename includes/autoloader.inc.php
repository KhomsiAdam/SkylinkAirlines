<?php
session_start();
spl_autoload_register('myAutoLoader');

function myAutoLoader($class_name) {
    $path = "C:/xampp/htdocs/Skylink_Airlines/classes/";
    $ext = ".class.php";
    $full_path = $path . $class_name . $ext;

    if (!file_exists($full_path)) {
        return false;
    }
    include_once $full_path;
}
?>