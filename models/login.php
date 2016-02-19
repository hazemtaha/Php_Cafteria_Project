<?php
require_once 'DbConnection.php';

$email = $_POST ["email"];
$password = $_POST ["password"];

	//object from DbConnection class==================
	$mycon =  DbConnection::getConnection("localhost","zahra","iti","cafteria");
	//query=============
	$sql = "SELECT * FROM users WHERE u_email= '".$email."' AND u_password = '".md5($password)."'";  
	$res = $mycon->query($sql);	
	if(mysqli_num_rows($res) > 0)  
           	{           		
           		$row=mysqli_fetch_array($res);

           		//ADMIN =============================
           		if($row['u_id'] = "1")
				{
					$_SESSION['id']=$row['u_id'];

					header("location: AdminMainPage.html");
				}

				//USER===============================
				else if ($row['u_id'] != "1")
				{	
					$_SESSION['id']=$row['u_id'];

					header("location: UserMainPage.html");	
				}
				else 
				{
					echo "<p> Please enter Vaild Data. </p> ";
				}


           	}

?>