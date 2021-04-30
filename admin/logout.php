<?php
require '../app/core/adminautoloader.php';

session_unset();
session_destroy();

header("Location: index");
?>