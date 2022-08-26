<?php
    function set_url( $url )
    {
        echo("<script>history.replaceState({},'','$url');</script>");
    }
?>