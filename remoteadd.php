<?php
    require("includes/functions.php");
    require("templates/header.php");

    $q = query("SELECT game FROM games");
    
    $message = "";
    
    checkforban($_SERVER["REMOTE_ADDR"]);
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["games"]) || empty($_POST["games"])){
            $message = "You must provide your name and game(s) you'd like to sign up for";
        } else {
            foreach($_POST["games"] as $check){
                $max = query("SELECT max(position) FROM `$check`");
                $pos = $max[0]["max(position)"] + 1;
                $time=date("g:i");
                $name = $_POST["name"]." [".$time."]";
                $ip = $_SERVER["REMOTE_ADDR"];
                $validateip = query("SELECT ip FROM `$check` WHERE ip = '{$ip}'");
                if ($validateip == false){
                    $row = query("INSERT INTO `$check` (name, ip, position) VALUES ('{$name}', '{$ip}', '{$pos}')");
                } else {
                    echo "You're already on the list";
                    echo "<br><a href='/pset7/public/index.php'>Back</a>";
                    exit();
                }
            }
            echo "You have been added to the list(s)";
		echo "<br><a href='/pset7/public/index.php'>Back</a>";
            exit();
        }
    }
        
?>
<div id="message"><?php echo $message ?></div>
<form name ="remoteadd" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
        echo "<input type='textarea' autocomplete='off' id='remoteaddname' name ='name' maxlength='10'><br>";

        foreach($q as $rows){
            echo "<input type='checkbox' id='chbox' name='games[]' value='".$rows["game"]."'>".
            $rows["game"].
            "<br>";
        }        
?>
<input type="submit" id="remoteaddsubmit" value="Add to list(s)">
</form>
<a href="logout.php">logout</a>
