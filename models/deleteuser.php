<?php
require_once "../controllers/DbConnection.php";
require_once "../controllers/user.php";
echo $_GET['id'];
$pro = new user(DbConnection::getConnection());
$result = $pro->delete_user($_GET['id']);
header("location: ../views/all-users.php");
//var_dump($result->fetch_assoc());









?>
