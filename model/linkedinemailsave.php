<?php
    // require '../controller/index3.php';
    require 'DatabaseConnection.php';
    class EmailSave{
        public function __construct(){
            $db=new DatabaseConnection;
            $this->conn=$db->conn;
            // var_dump($this->conn);
        }
        public  function password_generate($chars) 
        {
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($data), 0, $chars);
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
        public function EmailSave($username,$emailid){
            // echo "hi";
            // echo $emailid;
            // echo $username;
            $password = $this->password_generate(7);
            $confirm_password=$this->password_generate(7);
            // $password = password_hash($password,PASSWORD_DEFAULT);
            // $confirm_password=password_hash($confirm_password,PASSWORD_DEFAULT);
            echo $password;
            if(!$this->isUserExists($emailid)){
                $query="INSERT INTO users (username, emailid, password, confirm_password) VALUES('$username','$emailid','$password','$confirm_password')";
            // var_dump($query);
            // var_dump($this->conn->query($query));
                $result=$this->conn->query($query);
                $this->conn->close();
                return $result;
            }
            else{
                session_start();
                $_SESSION['emailid']=$emailid;
                header('location:/view/homepage.php');
            }
        }
    }
?>