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
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>404 page not found</p>
</body>
</html>