<?php
class Cart
{
	function __construct()
	{
		$servername='localhost';
		$dbusername='root';
		$dbpassword='';
		$dbname='csc350';
		####################################################
		$this->conn=new mysqli($servername,$dbusername,$dbpassword,$dbname);
		if ($this->conn->connect_error) die($conn->connect_error);
	}
	function addItem($userid,$item,$price)
	{
		$query="SELECT * from cart where userid='$userid' and item='$item'";
		$result = $this->conn->query($query);
		$rows=$result->num_rows;
		if($rows==0)
		{  
			$query="insert into cart values('$userid','$item',1,$price)";
			$result = $this->conn->query($query);
			return true;
		}
		$i=0;
		$result->data_seek($i);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$qty=(int)$row['quantity']+1;
		$query="update cart set quantity=$qty where userid='$userid' and item='$item'";
		$result = $this->conn->query($query);
		return true;	 	
	}
	function setItemNum($userid,$item,$price,$qty)
	{
		$qty=(int)$qty;
		$query="SELECT * from cart where userid='$userid' and item='$item'";
		$result = $this->conn->query($query);
		$rows=$result->num_rows;
		if($rows==0 )
		{  
			if($qty>0)
			{
				$query="insert into cart values('$userid','$item',$qty,$price)";
				$result = $this->conn->query($query);
				$this->conn->close();
			}
			return true;
		}
		$i=0;
		$result->data_seek($i);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		if($qty>0) $query="update cart set quantity=$qty where userid='$userid' and item='$item'";
		else $query="delete from cart where userid='$userid' and item='$item'";
		$result = $this->conn->query($query);
		return true;	 
	}
	function getItemQuantity($userid,$item)
	{
		$query="SELECT quantity from cart where userid='$userid' and item='$item'";
		$result = $this->conn->query($query);
		$result->data_seek(0);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		return (int)$row['quantity'];
	}
	function getCart($userid)
	{
		$query="SELECT * from cart where userid='$userid'";
		$result = $this->conn->query($query);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$rows=$result->num_rows;
		$str='<table><tr><th>ITEM</th><th>QTY</th><th>PRICE</th><th>EachItemTOTAL</th></tr>';
		for($i=0;$i<$rows;++$i)
		{
			$result->data_seek($i);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$item=$row['item'];
			$price=$row['price'];
			$qty=$row['quantity'];
			$str.="<tr><td>$item</td><td><form method='get' action='index.php'>".
					"<input type='text' size='1' name='qty' value='$qty' />".
					"<input type='hidden' name='choice' value='cart' />".
					"<input type='hidden' name='choice2' value='set' />".
					"<input type='hidden' name='item' value='$item'/>".
					"<input type='hidden' name='userid' value='$userid' />".
					"<input type='hidden' name='price' value='$price' />".
					"<input type='submit' value='ENTER'/></form>".
				    "</td><td>".$price."</td><td>".(float)$price* (int)$qty."</td></tr>";
		}
		$str.="</table>";
		return $str;
	}
	
		function getCartOrig($userid)
	{
		$query="SELECT * from cart where userid='$userid'";
		$result = $this->conn->query($query);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$rows=$result->num_rows;
		$str='<table><tr><th>ITEM</th><th>QTY</th><th>PRICE</th><th>EachItemTOTAL</th></tr>';
		for($i=0;$i<$rows;++$i)
		{
			$result->data_seek($i);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$item=$row['item'];
			$price=$row['price'];
			$qty=$row['quantity'];
			$str.="<tr><td>$item</td><td><form method='get' action='index.php'>".
					"<input type='text' size='1' name='qty' value='$qty' />".
					"<input type='hidden' name='choice' value='cart' />".
					"<input type='hidden' name='choice2' value='set' />".
					"<input type='hidden' name='item' value='$item'/>".
					"<input type='hidden' name='userid' value='$userid' />".
					"<input type='hidden' name='price' value='$price' />".
					"</form>".
				    "</td><td>".$price."</td><td>".(float)$price* (int)$qty."</td></tr>";
		}
		$str.="</table>";
		return $str;
	}
		function getQytCheck($userid)
	{
		$query="SELECT * from cart where userid='$userid'";
		$result = $this->conn->query($query);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$rows=$result->num_rows;
		
		for($i=0;$i<$rows;++$i)
		{
			$result->data_seek($i);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$item=$row['item'];
			$price=$row['price'];
			$qty=$row['quantity'];
			if((int)$qty >= 1)
			{
				return true;
				break;
			}
			 return false;
		}
	}
	
	function getCartTotal($userid)
	{
		$q = 0;
		$t = 0;
		$query="SELECT * from cart where userid='$userid'";
		$result = $this->conn->query($query);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$rows=$result->num_rows;
		$str='<table><tr><th>TOTAL QTY</th><th>TOTAL PRICE</th></tr>';
		for($i=0;$i<$rows;++$i)
		{
			$result->data_seek($i);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$item=$row['item'];
			$price=$row['price'];
			$qty=$row['quantity'];
			$t += (float)$price * (int)$qty;
			$q += $qty;
			
		}
		$str.= "</td><td>".$q."</td><td>".$t."</td></tr>";
		$str.="</table>";
		return $str;
	}
	
	
	function getItemPrice($userid,$item)
	{
		$query="SELECT price from cart where userid='$userid' and item='$item'";
		$result = $this->conn->query($query);
		$result->data_seek(0);
		$row=$result->fetch_array(MYSQLI_ASSOC);
		return (float)$row['price'];
	}
	function emptyCart($userid)
	{
		$query="delete from cart where userid='$userid'";
		$result = $this->conn->query($query);
	}
	
	function getItemCost($userid,$item)
	{
		return $this->getItemQuantity($userid,$item)*$this->getItemPrice($userid,$item);
	}
	
	function __destruct()
	{
		$this->conn->close();
	}
}
?>
