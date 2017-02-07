<?php
require("includes/config.php");
$row = query("DELETE FROM `seatingGames` WHERE game = ?", $_POST["game"]);
$hey = query("DROP TABLE `{$_POST["game"]}`");
?>
