<?php

require("includes/config.php");
require("templates/header.php");
?>

<ul class="nav nav-tabs">
    <li><a href="/">Home</a></li>
    <li class="active"><a href="monday.php">Monday</a></li>
    <li><a href="tuesday.php">Tuesday</a></li>
    <li><a href="wednesday.php">Wednesday</a></li>
    <li><a href="thursday.php">Thursday</a></li>
    <li><a href="friday.php">Friday</a></li>
    <li><a href="saturday.php">Saturday</a></li>
    <li><a href="sunday.php">Sunday</a></li>
    
</ul>

<?php

$day="monday";



$q = query("SELECT * from tourneys");

print_r($q);
?>