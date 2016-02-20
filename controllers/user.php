<?php

//require_once 'DbConnection.php';

//$user = new user();
//$user->Add_user();
/*
$pro = new Product(DbConnection::getConnection("localhost","aya","aya","cafteria"));
$result = $pro->insert_product();
header("location: Add_product.php");
*/
class user
{
	private $dbConnection;
    ///////Add Product to product table post method////////////////////////////////////////////////////////
	function __construct(mysqli $dbCon)
    {
        ////////////////////asking for something we need in product table to enter the name of category not the id
        $this->dbConnection = $dbCon;
    }


    function Add_user(){

	//$mycon =  DbConnection::getConnection("localhost","zahra","iti","cafteria");
    	//object from DbConnection class
        //===========================Add user==============================
	$sql = "INSERT INTO users (u_id,u_name,u_email,u_password,room_no, ext, u_img) VALUES ('', '".$_POST["name"]."', '".$_POST["email"]."', md5('".$_POST["password"]."'),
	'".$_POST["room"]."', '".$_POST ["ext"]."', '".$_POST["pic"]."')";

	if ($this->dbConnection->query($sql) === TRUE) {
    	   echo "New record created successfully";
	   } 
	else {
	      echo "Error: " . $sql . "<br>" . $this->dbConnection->query($sql)->error;
	   }

	}   
    	//============================Delete user===========================
	//===========if we make it not fixed we can use=====================
	//=======('".$_POST["condition"]."'= '".$_POST["query"]."')=========
	/*
	function Del_user (){

	$mycon =  DbConnection::getConnection("localhost","zahra","iti","cafteria");

	$sql = "DELETE FROM users WHERE ext = '".$_POST["ext"]."'";

	if ($conn->query($sql) === TRUE) {
	    echo "Record deleted successfully";
	} 
	else {
	    echo "Error deleting record: " . $conn->error;
	}
	}
	*/
	//=========================Get users================================
	/*function dispaly_users(){

		//$mycon =  DbConnection::getConnection("localhost","zahra","iti","cafteria");

		$sql = "SELECT * FROM users";

		$result = mysqli_query ($mycon, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
				echo "<div class="col-sm-12 table-responsive"> <table class="table table-condensed" > <thead> <tr> <th> Name</th><th>Room</th><th>image</th><th>Ext.</th><th>Action</th></tr> </thead> <tbody>";		    
				while($row = mysqli_fetch_assoc($result)) 
				{
		 		echo "<tr> <td>".$row["u_name"]."</td> <td>".$row["room_no"]."</td> <td>".$row["u_img"]."</td> <td>".$row["ext"]."</td> <td><a href="">Edit</a> <a href="">Delete</a></td></tr> " ;
		        }
		        echo "</tbody> </table> </div>";
		}  
	}*/     
	/*	
	//============================update user===============================
	$sql = "UPDATE users SET '".$_post["col-name"]."'= '".$_post["col-val"]."' WHERE id= '".$_POST["id"]."'";

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} 
	else {
	    echo "Error updating record: " . $conn->error;
	     }

	//============================Reset Password===========================
	$sql = "UPDATE users SET password= md5('".$_post["pass"]."') WHERE id= '".$_POST["id"]."'";

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} 
	else {
	    echo "Error updating record: " . $conn->error;
	     }
	
*/
	     //////////////////////////////////////
	     public function Login($value1,$value2){

                $sql = "SELECT * FROM users WHERE u_email= '".$value1."' AND u_password = '".$value2."'";  
				$res = $this->dbConnection->query($sql);	
				return $res;
				






	     }


    }

?>


