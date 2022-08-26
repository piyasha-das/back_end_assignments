<?php
    class connection{
        public $host="localhost";
        public $user="root";
        public $password="innoraft";
        public $db_name="mydatabase";
        public $conn;

        public function __construct(){
            $this->conn=new mysqli($this->host,$this->user,$this->password,$this->db_name);
        }
    }
    class register extends connection{
        public function registration($name,$emailid,$password,$confirm_password){
            $sql="SELECT * FROM users WHERE username='$username' OR emailid='$emailid'";
            $duplicate=mysqli->query($sql);
            if($duplicate->num_rows > 0){
                return 10;
            }
            else{
                if($password==$confirm_password){
                    $query="INSERT INTO users VALUES('','$name','$emailid','$password','$confirm_password')";
                    mysqli->query($query);
                    return 1;
                }
                else{
                    return 100;
                }
            }
        }
    }
?>