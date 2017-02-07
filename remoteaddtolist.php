<?php

require("includes/functions.php");

//print_r($_POST["games"])

if(isset($_POST["name"]) && !empty($_POST["games"])){
    foreach($_POST["games"] as $check){
        $max = query("SELECT max(position) FROM `$check`");
        $pos = $max[0]["max(position)"] + 1;
        $name = $_POST["name"]."[i]";
        $row = query("INSERT INTO `$check` (name, position) VALUES ('{$name}', '{$pos}')");
    }
} else {
    render("remoteadd.php", ["message" => "You must provide your name and at least one game"]);
}
?>
