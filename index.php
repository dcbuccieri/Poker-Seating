<?php

    // configuration
    require("includes/config.php"); 
	error_reporting(E_ALL);
    if($_SESSION["id"] != 1){
        redirect("remoteadd.php");
    }
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="scripts.js"></script>
<script>
$(function() {
  getList();
  getTourneys();
});
 
</script>

</head>

<body>

<div id="logo">
    <img src="img/pokerroomlogo.jpg">
</div>

<div id="today">

</div>

<div id="lists">
</div>



<div id = "markie">

</div>
</body>
</html>
