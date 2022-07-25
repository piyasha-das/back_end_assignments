<?php
    session_start();
    if(!isset($_SESSION['emailid'])){
      header('location:/view/register.php');
    }
    require '/var/www/Files/model/Login.php';
    // use GuzzleHttp\Client;
    // use GuzzleHttp\Psr7\response;
    // use GuzzleHttp\Exception\RequestException;
    // require 'Test.php';
    if (isset($_POST['submit-login'])) {
        $email=$_POST['login-email'];
        $pw=$_POST['login-password'];
        // echo $email;
        // echo $pw;
    
        $login=new Login;
        // var_dump($login);
        // var_dump($login);
        $afterlogin=$login->login($email,$pw);
        if($afterlogin->num_rows>0){
            // session_start();
            $_SESSION['emailid']=$email;
            if(!empty(session_id())){
              header('location:/homepage');
            }
        }
        else{
            // alert("your mail id or password is incorrect");
            echo '<script>alert("incorrect mail id or password")</script>';
            echo "<script>location.href='../view/register.php'</script>";
            // header('location:/view/register.php');
            // $flag=0;
            // return $flag;
        }            
      }
      if(isset($_POST['submit-linkedin'])){
        header("location:https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=86wh8kvzek5hzu&redirect_uri=http://localhost/controller/logincontroller2.php&state=123&scope=r_liteprofile%20r_emailaddress%20");
      }
?>