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
set_url("/?q=5");
// include 'logic.php';
?>
<!Doctype html>
<head>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="style2.css">
</head>
<body>
    <!-- <form action="submit_3.php" method="post">
        Email id : <input type="text" name="email">
        <input type="submit" value="submit">
    </form> -->
    <div class="container">
    <?php
          // session_start();
        //   echo "Welcome ". $_SESSION['username']."  ";
        //   echo "<a href='logoutform.php'>logout</a>";
        include 'upper.php';
    ?>
        <div class="title">EmailId page</div>
        <form action="submit_3.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">EmailId</span>
                    <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="EmailId" required>
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
</body>
</html>