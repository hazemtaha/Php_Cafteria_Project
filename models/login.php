<?php
require_once '../controllers/DbConnection.php';
require_once '../controllers/user.php';

session_start();
$pro = new user(DbConnection::getConnection());
$result = $pro->Login($_POST["email"],md5($_POST["password"]));
//var_dump($result);
//header("location: ../views/Add_product.php");
 if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	var_dump($row);
        if($row['u_id'] == "1")
			{
				$_SESSION['u_id']=$row['u_id'];
				setcookie("login",$_SESSION['u_id'],time()+(86400*30),"/");
				header("location: ../views/orders.html");
			}
		else if ($row['u_id'] != "1")
			{	
				$_SESSION['u_id']=$row['u_id'];
				setcookie("login",$_SESSION['u_id'],time()+(86400*30),"/");		
				header("location: ../views/UserMainPage.html");	
			}
	
    	}

}
else{

   header("location: ../views/Login1.html"); 

}


/*	if(mysqli_num_rows($result) > 0)  
           	{           		
           		$row=mysqli_fetch_array($result);

           		//ADMIN =============================
           		if($row['u_id'] = "1")
				{
					$_SESSION['id']=$row['u_id'];

					header("location: ../views/AdminMainPage.html");
				}

				//USER===============================
				else if ($row['u_id'] != "1")
				{	
					$_SESSION['id']=$row['u_id'];

					header("location: ../views/UserMainPage.html");	
				}
				else 
				{
					echo "<p> Please enter Vaild Data. </p> ";
				}


           	}
*/
?>
