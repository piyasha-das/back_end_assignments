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
set_url("/?q=3");
// echo $_SERVER['REQUEST_URI'];   
?>
<!Doctype html>
<head>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
</script>
<script src="pattern.js"></script>
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
    <div class="container">
        <?php
          // session_start();
        //   echo "Welcome ". $_SESSION['username']."  ";
        //   echo "<a href='logoutform.php'>logout</a>";
            include 'upper.php';
        ?>
        <form action="submit_2.php" method="post" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <label for="description">Enter Input : <i>(enter input in English|80 format)</i></label>
                    <textarea rows="10" cols="40"  name="description" id="textarea" required></textarea>
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
    <!-- <script>
        $(document).ready(function(){
            $('#texarea').mouseenter(function(){
                alert("hello");
            });
        });
        function check_pattern(){
            var pattern=/^[a-zA-Z]{1,}[|][0-9]{1,3}$/;
            var name=$('#textarea').val();
            console.log(name);
            if(pattern.test(name)&& name!==''){
                $('#textarea_error_messsage').hide();
            }else{
                $('#textarea_error_message').html("enter input in English|80 format");
            }
        }
    </script> -->
</body>
</html>