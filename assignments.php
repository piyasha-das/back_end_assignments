<?php
    session_start();
    $user=$_SESSION['username'];
    // echo "user".$user;
    // var_dump($_SESSION);
    // echo "hi".session_id();
    if(!isset($_SESSION['username'])) 
    {
      header('location:loginform.php');
      exit;
    }
    echo "hello";
    require 'logic.php';
    // if(session_status()=== PHP_SESSION_ACTIVE){
    //     $filename="assignments".$_GET['q'].".php";
    //     echo $filename;
    //     if(file_exists($filename)){
    //       header('location:'.$filename);
    //       // echo "hello";
    //     }
    // }
?>