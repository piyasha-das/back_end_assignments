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
        if( isset($_FILES['image']) ) { 
           
            $file_name=$_FILES['image']['name']; 
        
            $file_tmp=$_FILES['image']['tmp_name'];
         
            
        $val=move_uploaded_file($file_tmp, "uploads/".$file_name);
        $image=$_FILES['image']['name'];
        $img="uploads/".$image;
        echo'<img src="'.$img.'">';
        }
        include 'seturl.php';
        set_url("/?q=2");
        // echo $_GET(['q']);
    ?> 


<!Doctype html>
<head>
    <link rel="stylesheet" href="style2.css">
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
</head>
<body>
    <!-- <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit">
    </form> -->
    <form action="" method="post" enctype="multipart/form-data">
    <?php
          session_start();
        //   echo "Welcome ". $_SESSION['username']."  ";
        //   echo "<a href='logoutform.php'>logout</a>";
        include 'upper.php';
    ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="details"></span>
                    <input type="file" name="image">
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
            <a href="assignment7">7</a>
            <a href="#">&raquo;</a>
        </div>
</body>
</html>