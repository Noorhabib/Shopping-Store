<?php
class Login
{
	public function __construct()
	{
	}
	public function register($user,$pass)
	{
			####################################################
			$servername='localhost';
			$dbusername='root';
			$dbpassword='';
			$dbname='csc350';
			####################################################
			$conn=new mysqli($servername,$dbusername,$dbpassword,$dbname);
			if ($conn->connect_error) die($conn->connect_error);
			####################################################
			$query="SELECT * from login";
			$result = $conn->query($query);
			if(!$result) die($conn->error);
			####################################################
			$rows=$result->num_rows;
			for($i=0;$i<$rows;++$i)
			{
				$result->data_seek($i);
				$row=$result->fetch_array(MYSQLI_ASSOC);
				if($row['userid'] == $user)
				{
					$result->close();
					$conn->close();
					return false;
 				}
			}
			####################################################
			$query="insert into login values('$user','$pass')";
			$result = $conn->query($query);
			if(!$result) die($conn->error);
			####################################################
			$conn->close();
			return true;
	}
	public function login($user,$pass)
	{
		####################################################
		$servername='localhost';
		$dbusername='root';
		$dbpassword='';
		$dbname='csc350';
		####################################################
		$conn=new mysqli($servername,$dbusername,$dbpassword,$dbname);
		if ($conn->connect_error) die($conn->connect_error);
		####################################################
		$query="SELECT * from login";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
		####################################################
		$rows=$result->num_rows;
		for($i=0;$i<$rows;++$i)
		{
			$result->data_seek($i);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$userid=	$row['userid'];
			$password=	$row['password'];
			if(($user == $userid) && ($pass == $password))
			{
				return true;
				break;
			}
		}
		####################################################
		$result->close();
		$conn->close();
		return false;
	}
}
?>
