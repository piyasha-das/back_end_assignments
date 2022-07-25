<?php
    require '/var/www/Files/model/DatabaseConnection.php';
    class Login{
        public function __construct(){
                $db=new DatabaseConnection;
                // var_dump($db);
                // die();
                $this->conn=$db->conn;
                // var_dump($this->conn);
        }
        public function login($email,$pw){
            // echo('hi');
            $login_query="SELECT * FROM users where emailid='$email' and password='$pw'";
            // var_dump($login_query);
            // die();
            $result=$this->conn->query($login_query);
            return $result;
        }
    }
?>