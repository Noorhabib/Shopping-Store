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
      var data="item="+item+"&price="+price+"&choice=solopage&choice2=addToCart";
      var location="index.php?"+data;
      alert(location);
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
				<?php
				$conn=new mysqli('localhost','root','','csc350');
				$code=$_GET['code'];			
				if ($conn->connect_error) die($conn->connect_error);
				$query="SELECT * from catalog where code='$code'";
				$result = $conn->query($query);
				$count=$result->num_rows;
				if($count==1)
				{
          $row=$result->fetch_object();
					$name=$row->name;
					$image=$row->image;
					$price=$row->price;
					$description=$row->description;

            echo "<center><h2>$name</h2><img src='view/images/$image' style='width:400px' alt='example graphic' /></center>";
						echo	"<br><div style='border:solid green 1px;background:#FFFFFF;float:left'>
						<span class='left'></span>
						<div class='title'>$name</div>
						<p>$description<br />
                        <span style='float:right;text-align:left;padding:.5em;'>     
							<a href='#' onclick=\"addItem('$code',$price,'$name');\" >Add to Cart</a>&nbsp;&nbsp;<a href='index.php?choice=cart'>Goto Cart</a>
						</span></p>
						</div>
						<p style='clear:both'></p>";
				}
				?>
                  
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

