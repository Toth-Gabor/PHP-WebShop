<?php


abstract class AbstractDao
{
    private $host = "localhost";
    private $db_name = "php_login_system";
    private $username = "root";
    private $password = "";
    public $conn;

    // get the Database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        //echo "Connected successfully";
        return $this->conn;
    }
}