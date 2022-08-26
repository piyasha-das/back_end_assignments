<?php
 session_start();
  //  $user=$_SESSION['username'];
  //  // echo "user".$user;
  // //  var_dump($_SESSION);
  //  // echo "hi".session_id();
  //  if(!isset($_SESSION['username'])) 
  //  {
  //    header('location:loginform.php');
  //    exit;
  //  }
  if(session_status()=== PHP_SESSION_ACTIVE){
    $q = $_GET['q'];
    $filename="assignment".$_GET['q'].".php";
    // echo $filename;
    if(file_exists($filename)){
      header('location:'.$filename);
      // echo "hello";
    }
    else{
      if((empty($q) || is_NULL($q)) && isset($_SESSION['username'])) {
        echo $_SESSION['username'];
        header('location:assignment1.php');
        // die;
      }
    // }
      if(!empty($q) || (!is_NULL($q)) && isset($_SESSION['username'])) {
        echo $_SESSION['username'];
        header('location:notfound.php');
        // die;
      }
    }
      // else{
      //   header('HTTP/1.0 404 Not Found');
      //   die;
      // }
  }
  // else {
  //   header('location:loginform.php');
  // }
?>