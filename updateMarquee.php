<?php
    require("includes/config.php");
    if ($_SESSION["id"] == 1){
        $q = query("UPDATE marquee SET id = '{$_POST['text']}'");
    }
    
?>
