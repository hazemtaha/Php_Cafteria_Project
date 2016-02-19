<?php
require_once "../controllers/DbConnection.php";
require_once "../controllers/Product.php";
echo $_GET['id'];
$pro = new Product(DbConnection::getConnection("localhost","root","iti","cafteria"));
$result = $pro->delete_product($_GET['id']);
header("location: ../views/Show_Products.php");
//var_dump($result->fetch_assoc());









?>
