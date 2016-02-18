<?php
require_once "DbConnection.php";
require_once "Product.php";

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$upfile = "$DOCUMENT_ROOT/Project_Php/img/".$_FILES['p_img']['name'] ;
// Does the file have the right MIME type?
if ($_FILES['p_img']['type'] != 'image/jpeg')
{
echo 'Problem: file is not plain text';
exit;
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
header("location: Add_product.php");
/**
 * Created by PhpStorm.
 * User: ayasharafelden
 * Date: 2/12/16
 * Time: 1:11 PM
 */
