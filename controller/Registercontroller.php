<?php
session_start();
if(!isset($_SESSION['emailid'])){
  header('location:/view/register.php');
}
include '/var/www/Files/model/Register.php';

    
  // Register part.
  if (isset($_POST['submit'])) {
    $name=$_POST['username'];
    $emailid=$_POST['emailid'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    // echo $name;
    // echo $emailid;
    // echo $password;
    // echo $confirm_password;
    $register = new Register;
    echo "<br>";
    // var_dump($register);
    $registration=$register->registration($name,$emailid,$password,$confirm_password);
    var_dump($registration);
    if ($registration) {
      header('location:/view/landing_page.php');
    }
  }
  // Login part.
?>