<?php

    // configuration
    require("../includes/config.php"); 
    if($_SESSION["id"] != 1){
        redirect("remoteadd.php");
    }
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="./scripts.js"></script>
<script>
$(function() {
  getList();
  getTourneys();
});
 var time = new Date().getTime();
    $(document).bind("mousemove keypress", function(e) {
        time = new Date().getTime();
     });

 function refresh() {
     if(new Date().getTime() - time >= 60000) 
         window.location.reload(true);
     else 
         setTimeout(refresh, 30000);
 }

 setTimeout(refresh, 30000);
 
</script>

</head>

<body>

<div id="logo">
    <img src="img/pokerroomlogo.jpg">
</div>

<div id="lists">
</div>

<div id="today">

</div>

<div id = "markie">

</div>
</body>
</html>
