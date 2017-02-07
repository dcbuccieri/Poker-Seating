<?php

require("../includes/config.php");



$q = query("INSERT INTO `banned` (ip, name) VALUES ('{$_POST["ip"]}', '{$_POST["name"]}')");


?>
