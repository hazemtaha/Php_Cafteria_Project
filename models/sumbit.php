<?php
require_once "../controllers/DbConnection.php";
require_once "../controllers/Product.php";

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$upfile = "$DOCUMENT_ROOT/Project_Php/assets/img/".$_FILES['p_img']['name'] ;
// Does the file have the right MIME type?
if ($_FILES['p_img']['type'] != 'image/jpeg' || $_FILES['p_img']['type'] != 'image/png'
	|| $_FILES['p_img']['type'] != 'image/gif' || $_FILES['p_img']['type'] != 'image/jpg')
{
echo 'Problem: file is not Image';

}
if (is_uploaded_file($_FILES['p_img']['tmp_name']))
{
if (!move_uploaded_file($_FILES['p_img']['tmp_name'], $upfile))
{
echo 'Problem: Could not move file to destination directory';
 }
else
{
echo 'Problem: Possible file upload attack. Filename: ';
echo $_FILES['p_img']['name'];

}
//echo 'File uploaded successfully<br><br>';
}
$pro = new Product(DbConnection::getConnection("localhost","aya","aya","cafteria"));
$result = $pro->insert_product();
header("location: ../views/Add_product.php");
/**
 * Created by PhpStorm.
 * User: ayasharafelden
 * Date: 2/12/16
 * Time: 1:11 PM
 */
