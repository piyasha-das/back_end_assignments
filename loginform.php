<!Doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <div class="title">Login</div>
        <?php
            $myusername="piyasha";
            $mypassword="123";
            // echo gettype($_GET['q']);
            // echo 'q='.$_GET['q'];
            include 'logic.php';
            // echo "session".session_status();
            // if(session_status()==2){
            //     echo session_status();
            //     if ($_GET['q']=="1"){
            //         header(location:assignment1.php);
            //     }
            // }
            // if(session_status()=== PHP_SESSION_ACTIVE){
            //     $filename="assignment".$_GET['q'].".php";
            //     // echo $filename;
            //     if(file_exists($filename)){
            //       header('location:'.$filename);
            //       // echo "hello";
            //     }
            //   }
            if(isset($_POST['login'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                // echo session_status();
                // if(session_status()==1){
                //     if ($_GET['q']==1){
                //         header(location:assignment1.php);
                //     }
                // }
                // if(session_status()=== PHP_SESSION_ACTIVE){
                //     require 'assignment1.php';
                // }
                if($username==$myusername and $password==$mypassword){
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['password']=$password;
                    echo "session exists".session_status();
                    // if(session_status()==2){
                    //     include 'logic.php';
                    // }
                    
                    if(!empty(session_id())){
                        flush();
                        // header('')
                        header('location: assignment1.php');
                    }
                }else{
                    echo "Username or password is invalid";
                    // <div class="alert alert-danger alert-dismissible fade show">
                    // <strong>Invalid Username or Password</strong>
                    // <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    // </div>
                }
            }else{
                // header("location:loginform.php");
            }
            ?>
        <form action="" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="username" pattern="[A-Za-z]{1,}" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="button">
                        <input type="submit" name="login" value="login">
                </div>
                <!-- <div class="button">
                        <input type="submit" name="logout" value="logout" class="submit">
                </div> -->
            </div>
        <form>
    </div>
</body>