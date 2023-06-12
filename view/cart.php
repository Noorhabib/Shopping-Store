<?php
include_once('checker.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1" /> 
    <title>Confetti Cuisine</title>
    <link rel="stylesheet" href="view/css/bootstrap.css" />
    <link rel="stylesheet" href="view/css/confetti_cuisine.css" />
    <style type="text/css">
#content
{ text-align: left;
  width: 500px;
  padding: 0;
}
</style>

<style>
table{border:solid 3px #ed4a0f;font:1.2em monospace;}
table th,td{border:solid .5px #ed4a0f;}
table th{background-color: black;color:white;text-align:center}
table input[type="submit"]{background-color: #ed4a0f;color:white;}
</style>

  </head>
  <body>
    <div id="nav" style="background:black;color:white;">
      <div class="col-sm nav-align"><h1 id="title">BMCC ELECTRONICS</h1></div>
      <div class="col-sm nav-align">

      <?php include('menu.php'); ?>

      </div>
    </div>
<center>
    <div id="content">
        <div style="text-align: left; padding: 0;">
                <h1 style="font: normal 179% 'century gothic', arial, sans-serif;color: #43423F;margin: 0 0 15px 0;padding: 15px 0 5px 0;" >Carts</h1>
                <div class="form_settings">
              
                        <center>
                        <?php
                        if(isset($output)) 
						{
							echo "$output";
							
						}
                        ?>
						
						 <?php
	//if(isset($_GET['messsage'])) echo "<div style='color:red;width:330px'>".$_GET['message']."</div>";
	if(isset($message)) echo "<div style='color:red;width:330px'>".$message."</div>";
	?>
	<br>
	<p> <a href="index.php?choice=checkout">Goto Checkout Page</a></p>
                        </center>

				
              </div>
      </div>
	  
    </center>
	
  </body>
</html>
