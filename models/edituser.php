<?php
  require_once "../controllers/DbConnection.php";
  require_once "../controllers/user.php";

  $pro = new user(DbConnection::getConnection());

$upfile = "../assets/img/".$_FILES['pic']['name'] ;

if (!($_FILES['pic']['type'] =="image/jpg" OR $_FILES['pic']['type'] =="image/gif" OR $_FILES['pic']['type'] =="image/jpeg" OR $_FILES['pic']['type'] =="image/png"  ))
{
 	header("Location: ../views/edituser1.php");
}

if (is_uploaded_file($_FILES['pic']['tmp_name']))
{
	if (!move_uploaded_file($_FILES['pic']['tmp_name'], $upfile))
	{
		echo 'Problem: Could not move file to destination directory';
 	}
	else
	{
		echo 'Problem: Possible file upload attack. Filename: ';
		echo $_FILES['pic']['name'];
	}
}
  $result = $pro->edit_user($_GET["id"],$_POST["u_name"], $_POST["room_no"], $_POST["ext"],$_FILES['pic']['name']);

  header("Location: ../views/all-users.php");
  
?>
