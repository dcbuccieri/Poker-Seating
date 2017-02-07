<div id="logo">
    <img src="img/pokerroomlogo.jpg">
</div>
<?php
    require("../includes/functions.php");
    getLists();
    function getLists(){

    $games = query("SELECT game, tables FROM games");
    foreach($games as $game){
        $q = query("SELECT * FROM `{$game["game"]}` ORDER BY position ASC");
        $max = query("SELECT max(position) FROM `{$game["game"]}`");
        echo "<div id=\"".
        $game["game"]."list".
        "\" class=\"gamelist\">".
        "<div class=\"gametitle\">".
        $game["game"].
        "<div class='remoteTables'>".$game["tables"]."</div>".
        "</div>";
        
        if (count($q) > 0){
            foreach($q as $rows){
                echo "<div id=\"".$rows["id"]."\" class=\"row\">".
                "<div class=\"name\">".
                $rows["name"].
                "</div>".
                "</div>";
            }   
        }
        echo "</div>";
    }
    }
?>

