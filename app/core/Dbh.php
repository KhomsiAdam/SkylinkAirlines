<?php
// Database Handler
class Dbh {
    // Local Database Connection
    // private $host = "localhost";
    // private $user = "root";
    // private $pwd = "";
    // private $db_name = "skylink_db";

    // Remote Database Connection
    private $host = "remotemysql.com";
    private $user = "JrbJm0yZbc";
    private $pwd = "uAFnwomLY0";
    private $db_name = "JrbJm0yZbc";

    protected function connect() {
        // Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $conn = new PDO($dsn, $this->user, $this->pwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    }
}