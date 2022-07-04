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
include 'seturl.php';
set_url("/?q=4");
?>
<!Doctype html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
    .pagination {
        display: inline-block;
    }

  .pagination a {
    color: black;
    float: left;
    margin:8px 10px;;
    padding: 8px 16px;
    text-decoration: none;
  }
</style>
<link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          if (empty($_POST["phoneno"])){
            echo "Mobile number is required\n";
          }
          else{
            $phoneno= test_input($_POST["phoneno"]);
            // if (!preg_match("^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$",$phoneno)){
            //   $phErr = "should start with +91 and must contain 10 digits";
            //   $phoneno=" ";
            // }
            // if (!preg_match("/^[0-9]{10}+$/",$phoneno)){
            //     $phErr = "should start with +91 and must contain 10 digits";
            //     $phoneno=" ";
            //   }
          }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Mobile Number:<input type="text" name="phoneno" pattern="^[+]91[0-9]{10}"><?php echo $phErr; ?><br>
        <input type="submit" value="submit">
    </form> -->
    <div class="container">
    <?php
          // session_start();
        //   echo "Welcome ". $_SESSION['username']."  ";
        //   echo "<a href='logoutform.php'>logout</a>";
            include 'upper.php';
    ?>
        <div class="title">Mobile No page</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Mobile No</span>
                    <input type="text" name="phoneno" pattern="^[+]91[0-9]{10}"  placeholder="MobileNo" required>
                </div>
                <div class="button">
                        <input type="submit" name="submit" value="submit" class="submit">
                </div>
            </div>
        <form>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="assignment1.php">1</a>
            <a href="assignment2.php">2</a>
            <a href="assignment3.php">3</a>
            <a href="assignment4.php">4</a>
            <a href="assignment5.php">5a</a>
            <a href="assignment5_part2.php">5b</a>
            <a href="assignment6.php">6</a>
            <a href="assignment7.php">7</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
    <?php 
        if($_SERVER["REQUEST_METHOD"]== "POST"){
            echo "Your mobile number is: ". $phoneno;
        }
    ?>
<body>
</html>