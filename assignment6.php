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
  set_url("/?q=6");
// include 'logic.php';
?>
<!Doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
    .pagination {
        display: inline-block;
    }

  .pagination a {
    color: black;
    float: left;
    margin:4px 8px;
    padding: 8px 16px;
    text-decoration: none;
  }
</style>
</head>
<body>
    <div class="container">
    <?php
          // session_start();
            // echo "Welcome ". $_SESSION['username']."  ";
            // echo "<a href='logoutform.php'>logout</a>";
                include 'upper.php';
    ?>
        <div class="title">Registration</div>
        <form action="pdf.php" method="post" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name: </span>
                    <input type="text" name="fname" class="fname" pattern="[A-Za-z]{1,}" placeholder="Enter Your First Name" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name: </span>
                    <input type="text" name="lname" class="lname" pattern="[A-Za-z]{1,}" placeholder="Enter Your Last Name" required>
                </div>
                <div class="input-box">
                    <span class="details">Full Name: </span>
                    <input type="text" name="name" class="name" readonly><br>
                </div>
                <span class="details"></span>
                <input type="file" name="image">
                <div class="input-box">
                    <span class="details"></span>
                    <label for="description">Enter Input : <i>(enter input in English|80 format)</i></label><br>
                    <textarea rows = "10" cols = "40" name = "description" id="textarea" pattern="[A-za-z]{1,}|[0-9]{1,2}" required>
        
                    </textarea><br>
                </div>
                <div class="input-box">
                    <span class="details">Mobile No: </span>
                    <input type="text" name="phoneno" pattern="^[+]91[0-9]{10}" placeholder="Enter Your Mobile Number" required><br>
                </div>
                <div class="input-box">
                    <span class="details">Email id: </span>
                    <input type="text" name="emailid" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Your Email id" required><br>
                </div>
            </div>
            
            <div class="button">
                    <input type="submit" name="submit" value="submit" class="submit">
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