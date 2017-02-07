<?php
require("../includes/config.php");
$max = query("SELECT max(position) FROM `{$_POST["game"]}`");
$pos = $max[0]["max(position)"] + 1;
$row = query("INSERT INTO `{$_POST["game"]}` (name, position) VALUES ('{$_POST["name"]}', '{$pos}')");
?>
