<?php
require_once "../controllers/DbConnection.php";
require_once "../controllers/Product.php";
$pro = new Product(DbConnection::getConnection("localhost","aya","aya","cafteria"));
echo $_GET["id"];
$result = $pro->checkstatus($_GET["id"]);

 if ($result->num_rows == 1) {
            // output data of each row
           $row = $result->fetch_assoc();
                if($row['status'] ==0 ){
                   
                     
                      $pro = new Product(DbConnection::getConnection("localhost","aya","aya","cafteria"));
                      $result = $pro->changestatus($_GET['id'],1);
                      //echo "string1";
                      header("location: ../views/Show_Products.php");

}
else{


$pro = new Product(DbConnection::getConnection("localhost","aya","aya","cafteria"));
                      $result = $pro->changestatus($_GET['id'],0);
                       header("location: ../views/Show_Products.php");
//echo "string2";



        }}
var_dump($result->fetch_assoc());










?>
