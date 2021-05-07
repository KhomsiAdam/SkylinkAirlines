<?php
require 'app/core/autoloader.php';

session_unset();
session_destroy();

header("Location: index");