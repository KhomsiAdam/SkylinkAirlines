<?php
include 'C:/xampp/htdocs/Skylink_Airlines/includes/autoloader.inc.php';

session_unset();
session_destroy();

header("Location: index.php");
?>