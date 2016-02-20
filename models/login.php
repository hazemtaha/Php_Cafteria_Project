<?php
require_once '../controllers/DbConnection.php';
require_once '../controllers/user.php';


$pro = new user(DbConnection::getConnection("localhost","zahra","iti","cafteria"));
$result = $pro->Login($_POST["email"],$_POST["password"]);
//var_dump($result);
//header("location: ../views/Add_product.php");
 if ($result->num_rows == 1) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    if($row['u_id'] = "1")
										{
											$_SESSION['id']=$row['u_id'];

											header("location: ../views/AdminMainPage.html");
										}
									else if ($row['u_id'] != "1")
											{	
												$_SESSION['id']=$row['u_id'];

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
