<?php
require_once "../controllers/DbConnection.php";
require_once "../controllers/user.php";


$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$upfile = "../assets/img/".$_FILES['pic']['name'] ;
// Does the file have the right MIME type?
if (!($_FILES['pic']['type'] =="image/jpg" OR $_FILES['pic']['type'] =="image/gif" OR $_FILES['pic']['type'] =="image/jpeg" OR $_FILES['pic']['type'] =="image/png"  ) )
{
echo 'Problem: file is not Image';
}
if (is_uploaded_file($_FILES['pic']['tmp_name']))
{
		if (!move_uploaded_file($_FILES['pic']['tmp_name'], $upfile))
		{
		echo 'Problem: Could not move file to destination directory';
		//exit;
		 }
		else
		{
		echo 'Problem: Possible file upload attack. Filename: ';
		//echo $_FILES['pic']['name'];
		}
//echo 'File uploaded successfully<br><br>';
}
if($_POST["u_pass"]!==$_POST["con_pass"]){
    header("location: ../views/AddUser.php?id=1");

}
 if (!is_numeric($_POST["u_room"])) {
         header("location: ../views/AddUser.php?id=2");
    } 
  if(!is_numeric($_POST["ext"])) {
         header("location: ../views/AddUser.php?id=3");}

if($_POST["u_pass"]===$_POST["con_pass"] and is_numeric($_POST["u_room"]) and is_numeric($_POST["ext"])){

$pro = new user(DbConnection::getConnection("localhost","aya","aya","cafteria"));
$result = $pro->Add_user();
header("location: ../views/AddUser.php");




}	










?>


