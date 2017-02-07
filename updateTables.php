<?php
    require("includes/config.php");
    if ($_SESSION["id"] == 1){
        $q = query("UPDATE seatingGames SET tables = '{$_POST['tables']}' WHERE game = '{$_POST['game']}'");
    }
    
?>
