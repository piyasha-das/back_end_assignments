<?php
    var_dump($_COOKIE);
    // var_dump($_SESSION);
    setcookie("category","Books",time()+86400,"/");
    echo "The cookie is set";
?>