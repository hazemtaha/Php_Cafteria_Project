<?php
require_once "../controllers/DbConnection.php";
require_once "../controllers/Category.php";
/**
 * Created by PhpStorm.
 * User: ayasharafelden
 * Date: 2/15/16
 * Time: 12:00 AM
 */

$cat=new Category(DbConnection::getConnection());

$result = $cat->insert_product();
echo "jjdjd";
var_dump($result->fetch_assoc());
echo $result;
