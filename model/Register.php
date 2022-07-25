<?php
    // include 'app.php';
    include '/var/www/Files/model/DatabaseConnection.php';
    class Register{
        public function __construct(){
            $db=new DatabaseConnection;
            $this->conn=$db->conn;
            // var_dump($this->conn);
        }
        // echo $this->conn;

        public function registration($name,$emailid,$password,$confirm_password){
            
            $register_query="INSERT INTO users(username, emailid, password, confirm_password) VALUES('$name','$emailid','$password','$confirm_password')";
            $result=$this->conn->query($register_query);
            $this->conn->close();
            var_dump($result);
            return $result;
        }
        public function isUserExists($emailid){
            $checkuser = "SELECT emailid FROM users WHERE emailid='$emailid' LIMIT 1";
            $result=$this->conn->query($checkuser);
            if($result->num_rows>0){
                return true;
            }else{
                return false;
            }
        }
        public function confirmpassword($password,$confirm_password){
            if($password==$confirm_password){
                return true;
            }else{
                return false;
            }
        }
    }
?>