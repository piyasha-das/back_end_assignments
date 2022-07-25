<?php 
    session_start();
    if(!isset($_SESSION['emailid'])){
        header('location:/register');
    }
?>
<!Doctype html>
<head>
<link rel="stylesheet" href="/view/style.css">
</head>
<body>
    <div class="full-page" method="post">
        <p>About us</p>
    </div>
</body>
</html>