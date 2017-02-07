<?php
require("includes/config.php");
$row = query("DELETE FROM `{$_POST["game"]}` WHERE id = ?", $_POST["id"]);
?>
