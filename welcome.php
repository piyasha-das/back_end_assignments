<?php
        $username=$_POST['username'];
        if($username=="piyasha"){
            // session_start();
        }
        $_SESSION['username']=$username;
        // $_SESSION['username']="piyasha";
        // echo $_SESSION['username'];
        if(!isset($_SESSION['username'])){   
            echo "You are not logged in";
        }else{
            echo "You are logged in!";
        }
?>