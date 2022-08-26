<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION['username'])) {
      session_destroy();
    }
    // echo "Hi".var_dump($_SESSION["username"]);
    echo "You have successfully loggedout.click here to <a href='/'>login again</a>";
?>
</body>
</html>