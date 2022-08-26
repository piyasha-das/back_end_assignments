<?php
    session_start();
    if(isset($_SESSION['emailid'])){
        session_destroy();
        header('location:/register');
    }
?>