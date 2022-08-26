<?php
    class Database{
        private $db_host="localhost";
		private $db_user="root";
		private $db_pass="innoraft";
		private $db_name="mydatabase";
		
		private $mysqli=" ";
		private $conn=false;
		private $result=array();
        public function __construct(){
            if(!$this->conn){
                $this->mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
                $this->conn=true;
                if($this->mysqli->connect_error){
                    array_push($this->result,$this->mysqli->connect_error);
                    return false;
                }
            }else{
                return true;
            }
        }
        public function __destruct(){
            if($this->conn){
				if(this->mysqli->close()){
					$this->conn=false;
					return true;
				}
			}else{
				return false;
			}
        }
        public function register($name,$emailid,$password,$confirm_password){
            $sql="SELECT * FROM users WHERE username='$username' OR emailid='$emailid'";
            $duplicate=$this->mysqli->query($sql);
            if($duplicate->num_rows > 0){
                return 10;
            }
            else{
                if($password==$confirm_password){
                    $query="INSERT INTO users VALUES('','$name','$emailid','$password','$confirm_password')";
                    $this->mysqli->query($query);
                    return 1;
                }
                else{
                    return 100;
                }
            }
        }
    }	
?>