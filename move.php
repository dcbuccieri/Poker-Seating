<?php
require("includes/config.php");

// Code modified from: http://www.edroesch.com/2011/11/move-row-updown-with-mysqlphp/



// Variables -- Fill these out from the results of your page. (i.e. what item id to move up or down)
$id_item = $_POST["id"];   // ID of item you want to move up/down
$isUp = ($_POST["d"] == "true" ? true : false);   // Change to false if you want to move item down
 
// MySQL structure -- Fill these out to execute your queries without needing to update my code
$table_name = $_POST["game"];  // Name of table with your items in it
$col_position = "position"; // Name of column with position ID (Remember, this must be UNIQUE to all items)
$col_id = "id";           // Name of column containing the items id (most likely the auto_incremented column)
 
if ($isUp)
{
    $operator = "<";
    $order = "DESC";
}
else
{
    $operator = ">";
    $order = "ASC";
}
 
// Get row we are moving
$request = query("
    SELECT ".$col_position.", ".$col_id." FROM `".$table_name."`
    WHERE ".$col_id." = ".$id_item."
    LIMIT 1");
 
// Save data for row we are moving
if(count($request) > 0)  {
    $isPos1 = true;
        $position1 = $request[0]["position"];
        $id_item1 = $request[0]["id"];
}
 
// Get row we want to swap with
$request2 =  query("
    SELECT ".$col_position.", ".$col_id." FROM `".$table_name."`
    WHERE ".$col_position." ".$operator." ".$position1."
    ORDER BY ".$col_position." ".$order." LIMIT 1");
 
// Save data from row we want to swap with
if(count($request2) > 0)  {
    $isPos2 = true;
        $position2 = $request2[0]["position"];
        $id_item2 = $request2[0]["id"];
}
print_r($request2); 
// If both rows exist (indicating not top or bottom row), continue
if ($isPos1 && $isPos2)
{

        
    $query_update = query("
        UPDATE `".$table_name."`
        SET ".$col_position." = ".$position2."
        WHERE ".$col_id." = ".$id_item1."
        ");
     
    $query_update2 = query("
        UPDATE `".$table_name."`
        SET ".$col_position." = ".$position1."
        WHERE ".$col_id." = ".$id_item2."
        ");
}
?>
