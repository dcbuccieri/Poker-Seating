<?php
    require("includes/functions.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="scripts.js"></script>
<script>
$(function() {
  getFront();
  getTourneys();
});
</script>

</head>
<body>

<div id="lists">
</div>

<div id="today">
    
</div>
<?php
    // $q = query("SELECT * FROM marquee");
    // $marquee = $q[0]['id'];
?>
<marquee behavior="scroll" direction="left" id="markie"><?php echo "This used to work"; ?></marquee>

</body>
</html>
