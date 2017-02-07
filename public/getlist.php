<?php
    require("../includes/functions.php");
    getLists();
    
    function getLists(){
    
        $allnames = array();
        $q = query("SELECT game, tables FROM games");
        foreach($q as $game){
            $q = query("SELECT * FROM `{$game["game"]}` ORDER BY position ASC");
            $max = query("SELECT max(position) FROM `{$game["game"]}`");
            echo "<div id=\"".
            $game["game"]."list".
            "\" class=\"gamelist\">".
            "<div class=\"gametitle\">".
            $game["game"].
            "<form class='tables'><input type='textarea' id='".$game['game']."tables' value='".$game['tables'].
            "'><input type='button' onclick='updateTables(\"".$game["game"]."\")' value='Update'></form></div>"; //insert form for table list here
            
            if (count($q) > 0){
                foreach($q as $rows){
                    $allnames[$rows["name"]] = $rows["ip"] ;
                    echo "<div id=\"".$rows["id"]."\" class=\"row\">".
                    "<div class=\"name\">".
                    $rows["name"].
                    "</div>".
                    "<div class=\"close\" onclick=\"removeName('".$rows["id"]."', '".$game["game"]."')\">&#10060;</div>".
                    "<div class=\"up\" onclick=\"moveName('".$rows["id"]."', '".$game["game"]."', 'true"."')\">&#9650;</div>".
                    "<div class=\"down\" onclick=\"moveName('".$rows["id"]."', '".$game["game"]."', 'false"."')\">&#9660;</div>".
                    "</div>";
                }   
            }
            
            
        echo "<form name='form' class='nameForm' action='javascript:void(0)' autocomplete='off' onsubmit=\"addName('".
            $game['game'].
            "')\">
            <input id='".
            $game['game'].
            "' type='text' name='name' class='nameText' maxlength='15'></input>
            <input type='button' name='submit' value = 'Add' onclick=\"addName('".
            $game['game'].
            "')\"></input>
            </form></div>";
        }
        
        //start admin section
        echo "<div id='admin'>";
        //Add Game
        ?>
        <form name="form" id="gameForm" onsubmit="addGame()" action="javascript:void(0)">
        <input id="gameName" type="text" name="game"></input>
        <input type="button" name="submit" value = "Add Game" onclick="addGame()"></input>
        </form>  
        <?php
        
        // Remove Game
        
        echo "<form name='remove' id='removeForm'><select name='remove' id='removelist'>";
        $q = query("SELECT game FROM games");
        foreach($q as $rows){
            echo "<option value=\"".
            $rows["game"]."\">".
            $rows["game"];
        }
        echo "</select><input type=\"button\" autocomplete = \"off\" id=\"removegame\" onclick=\"removeGame()\" value=\"Remove Game\"></input></form>";
        
        //marquee
        $q = query("SELECT * FROM marquee");
        ?>
        <form name="marquee" id="marquee" onsubmit="updateMarquee()" action="javascript:void(0)">
        <input type="text" id="markietext" value="<?php echo $q[0]['text'] ?>"></input>
        <input type="button" name="submitM" value = "Update Marquee" onclick="updateMarquee()"></input>
        </form>  
        
        <?php
        //Ban List
#        echo "<form name='banlist' id='banForm'><select name='ban' id='bannames'>";
#        foreach($allnames as $k => $v){
#            if(!empty($v) && !in_array($k, $allnames)){
#                echo "<option value=\"".
#                $v."\">".
#                $k;
#            }
#        }
#        echo "</select><input type='button' name='ban' value = 'Ban player' onclick='banIP()'></input></form>";
        
        //UnBan List
#        echo "<form name='unbanlist' id='unbanForm'><select name='unban' id='unban'>";
#        $unban = query("SELECT name, ip FROM `banned`");
#        foreach($unban as $un){
#            echo "<option value=\"".
#            $un["ip"]."\">".
#            $un["name"];
#        }
#        echo "</select><input type='button' name='unban' value = 'Un-Ban player' onclick='unbanIP(\"".$un["ip"]."\")'></input></form>";
#        
        //Tournament Entries
        ?>
            
        <?php
        
        echo "<a href='logout.php'>logout</a>";
        echo "<a href='updatetournaments.php'>tournaments</a>";
        
        echo "</div>"; //end admin section
    }
    
?>
