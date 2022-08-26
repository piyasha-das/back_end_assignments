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
<!Doctype html>
<head>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
</head>
<body>
<form method="post" action="pdf.php" enctype="multipart/form-data">
  First Name:<input type="text" name="fname" class="fname" pattern="[A-Za-z]{1,}" required><?php echo $fnameErr;?><br>
  Last Name:<input type="text" name="lname" class="lname" pattern="[A-Za-z]{1,}" required><?php echo $lnameErr; ?><br>
  Full Name:<input type="text" name="name" class="name" readonly><br>
  <input type="file" name="image"><br>
  <label for="description">Enter Input : <i>(enter input in English|80 format)</i></label><br>
        <textarea rows = "10" cols = "40" name = "description" id="textarea" pattern="[A-za-z]{1,}|[0-9]{1,2}" required>
        
         </textarea><br>
         Mobile Number:<input type="text" name="phoneno" pattern="^[+]91[0-9]{10}"><br> 
         Email id: <input type="text" name="emailid" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required><br>
  <input type="submit" name="submit" value="submit" class="submit">
</form>

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