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
    
    <style>
.title
{
    color:white;
    background-color: #2F2827;
    font-family: Arial,Helvetica,sans-serif;
    font-size: large;
    padding: .2em;
    margin-left: .5em;
    margin-bottom: .1em;
    float: right;
    text-align: left;
   width: 30%;
   font-weight: bold;
   font-variant: small-caps;
   text-align:right;
}
.left
{
	float: left;
	width: auto;
	margin-right: 10px;
}
#content
{ 
  text-align: left;
  width: 550px;
  padding: 0;
}
</style>
    
<style>
.title
{
    color:white;
    background-color: #2F2827;
    font-family: Arial,Helvetica,sans-serif;
    font-size: small;
    padding: .2em;
    margin-left: .5em;
    margin-bottom: .1em;
    float: right;
    text-align: left;
   width: 30%;
   font-weight: bold;
   font-variant: small-caps;
   text-align:right;
}
.left
{
	float: left;
	width: auto;
	margin-right: 10px;
}
#content
{ 
  text-align: left;
  width: 550px;
  padding: 0;
}
</style>
<style>
      .modal-look
      {
       position: fixed;
       width: 100vw;
       height : 100vh;
       background: rgba(0,0,0,0.5);
       top : 0;
       display: none;
     }
     
     #modal-content
     {
        width: 200px;
        margin: auto;
        margin-top: 37vh;
        background: white;
        border-radius: 10px;
        padding : 10px;
        text-align: center;
        display: none;
     }
</style>
<script>
function displayModal(namex)
{
    document.getElementById("modal").style.display="block";
    document.getElementById("item_added").innerHTML="<div style='font-size: 12px;'>"+namex+" Added To Web Cart</div>";
    document.getElementById("modal-content").style.display="block";
}

function closeModal()
{
    document.getElementById("modal").style.display="none";
}
</script>
<script>
function addItem(item,price,name)
{
	var ajaxRequest; 
	try{ajaxRequest = new XMLHttpRequest();}
	catch (e)
	{
		try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");}
		catch (e) 
		{
			try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");}
			catch (e){alert("Your browser broke!");return false;}
		}
	}
	ajaxRequest.onreadystatechange = function()
	{
		if(ajaxRequest.readyState === 4)//Process Server Response
		{
			displayModal(name);
		}
	};
      //Send Request 
      var data="item="+item+"&price="+price+"&choice=products&choice2=addToCart";
      var location="index.php?"+data;
      ajaxRequest.open("GET", location, true);
      ajaxRequest.send(null); 
}
</script>    
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
              
                
                
              
                        <center>
                          <img src="view/images/Fonemask.jpg" style="width:400px" alt="example graphic" />
                        </center>
                        
                          
                              <h2>Fonemask Screen Protector</h2>
                              <p>
                                Our 3-Pack premium tempered glass screen protectors specifically designed 
						 for iPhone 14 pro Max / 14 plus, 13 Pro max / 14, 13, 13 pro. Top-quality 
						 tempered glass material is used in our screen protectors ensuring clarity 
						 and protection for your device.<br />
                                <span style="float:right;text-align:left;padding:.5em;">
                                    <a href="#" onclick="addItem('Fonemask','9.99','Fonemask Screen Protector');">Add to Cart</a>&nbsp;&nbsp;<a href="index.php?choice=cart">Goto Cart</a>
                                </span>
                              </p>
                      
                        
            </div>
</center>               
  <!-- ============================================================================= -->  
<div class="modal-look" id="modal">
          <div class="" id="modal-content">
            <h3 id="item_added" style='color:black;'></h3>
            <button type="button" name="button" onclick="closeModal()">Okay</button>
          </div>
</div>
<!-- ============================================================================= -->    
  </body>
</html>
