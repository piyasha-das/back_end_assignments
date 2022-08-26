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
// if(session_status()=== PHP_SESSION_ACTIVE){
//       echo session_status();
//       echo $_GET['q'];
//        if ($_GET['q']=='2'){
//           header('location:assignment2.php');
//           exit;
//       }
//       echo $_GET['q'];
//        if ($_GET['q']=='3'){
//           header('location:assignment3_new.php');
//           exit;
//       }
//       echo $_GET['q'];
//        if ($_GET['q']=='4'){
//           header('location:assignment4.php');
//           exit;
//       }
//       echo $_GET['q'];
//        if ($_GET['q']=='5'){
//           header('location:assignment5.php');
//           exit;
//       }
//       echo $_GET['q'];
//        if ($_GET['q']=='6'){
//           header('location:Form.php');
//           exit;
//       }
//   }
// if(session_status()=== PHP_SESSION_ACTIVE){
//   $filename="assignment".$_GET['q'].".php";
//   // echo $filename;
//   if(file_exists($filename)){
//     header('location:'.$filename);
//     // echo "hello";
//   }
// }

  include 'seturl.php';
  set_url("/?q=1");


  // $url=set_url("/q=1");
  // echo $_SERVER['HTTP_HOST'];
  // echo $_SERVER['REQUEST_URI'];    
  // echo "hello".$_SERVER['QUERY_STRING'];

  // $path = $_SERVER['HTTP_HOST'];
  // if (!empty($path)) {
  //   // echo "hi";
  //   // echo $_GET['q'];
  //   include 'logic.php';
  // }

  // echo $path;
  // $path .= $url;
  // echo $path;
  // include_once($path);
  // include 'logic.php';
 
?>
<!Doctype html>
<head>
  <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
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
</head>
<body>
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["fname"])){
      echo "first name is required\n";
    }
    else{
      $fname = test_input($_POST["fname"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
        $fnameErr = "Only letters and white space allowed";
        $fname=" ";
      }
    }
  }

  if($_SERVER["REQUEST_METHOD"]== "POST"){
    if(empty($_POST["lname"])){
      echo "last name is required";
    }
    else{
      $lname=test_input($_POST["lname"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed";
        $lname=" ";
      }
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
  First Name:<input type="text" name="fname" class="fname" pattern="[A-Za-z]{1,}" required><?php echo $fnameErr;?><br>
  Last Name:<input type="text" name="lname" class="lname" pattern="[A-Za-z]{1,}" required><?php echo $lnameErr; ?><br>
  Full Name:<input type="text" name="name" class="name" readonly><br>
  <input type="submit" name="submit" value="submit" class="submit">
</form> -->
<div class="container">
    <?php
      include('upper.php');
          // echo "Welcome ". $_SESSION['username']."  ";
          // echo "<a href='logoutform.php'>logout</a>";
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Firstname</span>
                    <input type="text" name="fname" class="fname" pattern="[A-Za-z]{1,}" placeholder="First Name" required>
                </div>
                <div class="input-box">
                    <span class="details">lastname</span>
                    <input type="text" name="lname" class="lname" pattern="[A-Za-z]{1,}" placeholder="last Name" required>
                </div>
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="name" class="name" readonly>
                </div>
                <div class="button">
                        <input type="submit" name="submit" value="submit" class="submit">
                </div>
            </div>
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"]== "POST"){
                $name = "hello " . $fname ."  ".$lname;
                echo $name;
            }
        ?>
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
<script>
    $(document).ready(function(){
      $('.fname').change(function(){
        $('.name').val($(this).val());
      })
      $('.lname').change(function(){
        $('.name').val($('.name').val()+" "+$(this).val());
      })
    });
  </script>
</body>
</html>
<?php
// }
?>
