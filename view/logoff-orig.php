<?php 
include_once('checker.php'); 
?>

<html><head><title>LOGIN WEB SESSION</title>
<link rel="stylesheet" type="text/css" href="view/css/loginsession.css" />
<link rel="stylesheet" type="text/css" href="view/css/menu.css" />
</head>
<body>

<center>	
<div style='width:600px' id="menu">
<table align=center>
<tr>
  <?php include('menu.php');?>
</tr>
</table>
</div>
</center>

<center>
<form action="index.php" method="get">
	<div style='text-align:left;width:600px'>
   <center>
   <input type="hidden" name="choice" value="logoff2" />
   <input type="submit" value="Logoff">
   </center>
   </div>
</form>
</center>

</body>
</html>
