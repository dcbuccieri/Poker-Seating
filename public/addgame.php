<?php

require("../includes/config.php");



$check = query("SELECT game FROM `games` WHERE game = '{$_POST["game"]}'");

if(empty($check)){
    $b = query("CREATE TABLE `{$_POST["game"]}` (id int NOT NULL AUTO_INCREMENT, name VARCHAR(25), ip VARCHAR(45) DEFAULT NULL, position INT(12), PRIMARY KEY(id))");
    $a = query("INSERT INTO games (game, tables) VALUES ('{$_POST["game"]}', 0)");
}
?>
