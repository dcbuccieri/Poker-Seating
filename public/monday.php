<?php

require("../includes/config.php");
require("../templates/header.php");
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

if ($_SESSION["id"] == 1){
    if (isset($_POST['submit'])){
    echo "Tournaments Table Updated";
        isset($_POST["pog1"]) ? $pog1 = 1 : $pog1 = 0;
        isset($_POST["pog2"]) ? $pog2 = 1 : $pog2 = 0;
        isset($_POST["pog3"]) ? $pog3 = 1 : $pog3 = 0;
        isset($_POST["pog4"]) ? $pog4 = 1 : $pog4 = 0;
        isset($_POST["special1"]) ? $special1 = 1 : $special1 = 0;
        isset($_POST["special2"]) ? $special2 = 1 : $special2 = 0;
        isset($_POST["special3"]) ? $special3 = 1 : $special3 = 0;
        isset($_POST["special4"]) ? $special4 = 1 : $special4 = 0;
        
        $save = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 1", $_POST["t1name"], $_POST["t1desc"], $pog1, $special1);
        $save1 = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 2", $_POST["t2name"], $_POST["t2desc"], $pog2, $special2);
        $save2 = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 3", $_POST["t3name"], $_POST["t3desc"], $pog3, $special3);
        $save3 = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 4", $_POST["t4name"], $_POST["t4desc"], $pog4, $special4);
        $update1 = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 5", $_POST["t1name"], $_POST["t1desc"], $pog1, $special1);
        $update2 = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 6", $_POST["t2name"], $_POST["t2desc"], $pog2, $special2);
        $update3 = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 7", $_POST["t3name"], $_POST["t3desc"], $pog3, $special3);
        $update4 = query("UPDATE tourneys SET `name` = ?, `desc` = ?, `pog` = ?, `special` = ? WHERE id = 8", $_POST["t4name"], $_POST["t4desc"], $pog4, $special4);
    
    
    }
}


$q = query("SELECT * FROM tourneys WHERE day = '{$day}'");

echo "<form role='form' class='form-inline' method = 'post' action='". $_SERVER['PHP_SELF']."'>";
$c = 0;
foreach ($q as $row){
    $c++;
    $row['pog'] == 1 ? $pog = " checked='checked'" : $pog = "";
    $row['special'] == 1 ? $special = " checked='checked'" : $special = "";
    
    echo "
    <div class='form-group'>
        <label for='t1name'>Name:</label>
        <input type='text' class='form-control' name = 't".$c."name' value='".$row['name']."'>
    </div>
    <div class='form-group'>
        <label for='t1name'>Description:</label>
        <input type='text' class='form-control' name = 't".$c."desc' value='".$row['desc']."'>
    </div>
    <div class='checkbox'>
        <label><input type='checkbox' name = 'pog".$c."'".$pog."'>P.O.G</label>
    </div>
    <div class='checkbox'>
        <label><input type='checkbox' name = 'special".$c."'".$special."'>Special</label>
    </div><br>
    ";
}
?>
<button type="submit" name = "submit" class="btn btn-default">Save & Update</button>
</form>
