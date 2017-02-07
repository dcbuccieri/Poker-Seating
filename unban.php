<?php

require("includes/config.php");



$q = query("DELETE FROM `banned` WHERE ip =  ('{$_POST["ip"]}')");


?>
