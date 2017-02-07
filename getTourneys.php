<?php
    require("includes/functions.php");
    getTourneys();
    function getTourneys(){

    //$events = query("SELECT * FROM tourneys WHERE day = ''");
    echo "<div id='tt'>Today's<br>Tournaments</div>";
    
    // foreach($events as $event){
        // $event["pog"] == 1 ? $pog = "pog" : $pog = "";
        // $event["special"] == 1 ? $special = "special" : $special = "";
        // echo "<div class='".$special."'><h1 class='".$pog."'>".$event["name"]."</h1>".
        // "<h3>".$event["descr"]."</h3></div>";
    // }
    }
?>

