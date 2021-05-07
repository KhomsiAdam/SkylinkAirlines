<?php
// Database Handler
class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $db_name = "skylink_db";

    protected function connect() {
        // Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $conn = new PDO($dsn, $this->user, $this->pwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    }
}