<?php 
include_once('checker.php'); 
?>

<html><head><title>LOGIN WEB SESSION</title>
<link rel="stylesheet" type="text/css" href="view/css/loginsession.css" />
<link rel="stylesheet" type="text/css" href="view/css/menu.css" />
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
<div style='text-align:left;width:600px'>
<h2>Products</h2> 

<img src='view/images/lgtv.jpg' width='200px' style="float:left"/><br style="clear:both">
<input type="button" value="Add2Cart" onclick="addItem('lgtv','1200.99','LG HDTV');" style="float:left" /><br style="clear:both">

<img src='view/images/sonytv.jpg' width='200px' style="float:left" /><br style="clear:both">
<input type="button" value="Add2Cart" onclick="addItem('sonytv','1500.39','SONY HDTV');" style="float:left" /><br style="clear:both">

<a href="index.php?choice=cart">PROCEED TO WEB CART<a>
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
