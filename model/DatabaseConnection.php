<?php
    class DatabaseConnection{
        public $host="localhost";
        public $user="root";
        public $password="innoraft";
        public $db_name="mydatabase";
        public $conn;
        public function __construct(){
            $this->conn=new mysqli($this->host,$this->user,$this->password,$this->db_name);
            if($this->conn->connect_error){
                die("<h1>connection_failed</h1>");
            }
            // echo "database connection successful";
            return $this->conn;
        }
    }
?>