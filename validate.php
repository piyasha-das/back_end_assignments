<?php
    $myusername="piyasha";
    $mypassword="123";
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if($username==$myusername and $password==$mypassword){
            session_start();
            $_SESSION['username']=$username;
            header("location:assignment1.php");
        }else{
            echo "Username or password is invalid <br>click here to<a href='loginform.php'> try again</a>";
        }
    }else{
        header("location:loginform.php");
    }
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style3.css">
</head>
</html>