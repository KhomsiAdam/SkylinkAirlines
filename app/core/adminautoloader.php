<?php
session_start();
// Autoloads the Database Handler
spl_autoload_register(function (){
    $filename="../app/core/Dbh.php";
        if(!file_exists($filename))
        {
            return "file : $filename is not Exist on the Given Path";
        }
    require_once "../app/core/Dbh.php";
});
// Autoloads the Models
spl_autoload_register(function ($class){
    $filename="../app/models/$class.php";
        if(!file_exists($filename))
        {
            return "file : $filename is not Exist on the Given Path";
        }
    require_once "../app/models/$class.php";
});
// Autoloads the Controllers
spl_autoload_register(function ($class){
    $filename="../app/controllers/$class.php";
        if(!file_exists($filename))
        {
            return "file : $filename is not Exist on the Given Path";
        }
    require_once "../app/controllers/$class.php";
});
// Autoloads the Views
spl_autoload_register(function ($class){
    $filename="../app/views/$class.php";
        if(!file_exists($filename))
        {
            return "file : $filename is not Exist on the Given Path";
        }
    require_once "../app/views/$class.php";
});