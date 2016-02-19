<?php
  require_once "../controllers/DbConnection.php";
  require_once "../controllers/Product.php";
  $pro = new Product(DbConnection::getConnection("localhost","root","iti","cafteria"));
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$upfile = "$DOCUMENT_ROOT/Project_Php/assets/img/".$_FILES['p_img']['name'] ;
// Does the file have the right MIME type?
if ($_FILES['p_img']['type'] != 'image/jpeg'|| $_FILES['p_img']['type'] != 'image/png'
	|| $_FILES['p_img']['type'] != 'image/gif')
{
 header("Location: ../views/EditProduct.php");

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
  $result = $pro->update_product($_GET["id"],$_POST["p_name"],$_POST["u_price"],$_POST["ctg_id"],$_FILES['p_img']['name']);
header("Location: ../views/Show_Products.php");
  
?>
