<?php
    // include 'DatabaseConnection.php';
    // include '/view/register.php';
    include 'RegisterController.php';
    // define('DB_HOST','localhost');
    // define('DB_USER','root');
    // define('DB_PASSWORD','innoraft');
    // define('DB_DATABASE','mydatabase');
    // include_once('DatabaseConnection.php');
    $db = new RegisterController;
    // var_dump($db);



    // function validateInput($dbconn,$input){
    //     return mysqli_real_escape_string($dbconn,$input);
    // }
                // $name=validateInput($db->conn,$_POST['username']);
                // $emailid=validateInput($db->conn,$_POST['emailid']);
                // $password=validateInput($db->conn,$_POST['password']);
                // $confirm_password=validateInput($db->conn,$_POST['confirm_password']);
    // if(isset($_POST['submit'])){
    //     $name=validateInput($db->conn,$_POST['username']);
    //     $emailid=validateInput($db->conn,$_POST['emailid']);
    //     $password=validateInput($db->conn,$_POST['password']);
    //     $confirm_password=validateInput($db->conn,$_POST['confirm_password']);

    //     $register=new RegisterController;
    //     $result_password=$register->confirmpassword($password,$confirm_password);
    //     if($result_password){
    //     }else{
    //         alert("password and confirm password does not match");
    //     }
    // }
    // header('location:authenticationcode.php');
?>