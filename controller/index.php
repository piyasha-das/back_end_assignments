<?php
    echo "hi";
    include '/view/register.php';
    include '/model/function.php';
    $name=$_POST['username'];
    $emailid=$_POST['emailid'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    echo $name;
    echo $emailid;
    echo $password;
    echo $confirm_password;
    // $object=new Database();
    // var_dump($object);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['submit'])){
            $obj = new Database();
            var_dump($obj);
            $flag=$obj->register($name,$emailid,$password,$confirm_password);
            if($flag==1){
                header('location:landing_page.php');
            }
            if($flag==10){
                echo "user already exist";
            }
            if($flag==100){
                echo "error in confirm password";
            }
        }
    }
?>