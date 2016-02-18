<?php

/**
 * Created by PhpStorm.
 * User: ayasharafelden
 * Date: 2/11/16
 * Time: 7:29 AM
 */
class Product

{

private $dbConnection;
    ///////Add Product to product table post method////////////////////////////////////////////////////////
	function __construct(mysqli $dbCon)
    {
        ////////////////////asking for something we need in product table to enter the name of category not the id
        $this->dbConnection = $dbCon;
    }

        public  function insert_product(){
        $sql = "INSERT INTO products (p_name,u_price,ctg_id,p_img)
                 VALUES ('".$_POST["p_name"]."', '".$_POST["u_price"]."', '".$_POST["ctg_id"]."','".$_FILES['p_img']['name']."')";


        if ($this->dbConnection->query($sql) === TRUE) {
             
          header("location: add_product.html");

        } else {
            echo "Error: " . $sql . "<br>" . $this->dbConnection->query($sql)->error;
        }
    }
    /////////////////////////////////////////////////////////Second function/////////////////////////////////////////////////
    ///////////////////////////////////////////disable status///////////////////////////////////////////////////////////////
 public  function disable_status(){
        ///////////////////post id of user and product status post method
        $sql = "UPDATE products SET  status='".$_POST["p_status"]."' WHERE id='".$_POST["u_id"]."'";

        if ($this->dbConnection->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->dbConnection->error;
        }

 }
    //////////////////////////////////////////////////////////Third Function///////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////Update Product post method////////////////////////////////////////////////////////
   public function update_product($v,$v1,$v2,$v3,$v4){
        //////////////////////////////////////update by name////////////////////////////////////////////////////////////////
        //////////////////////////////////////if will update price////////////////////////////////////////////////////////
       
            $sql = "UPDATE products SET  p_name='".$v1."', u_price='".$v2."',ctg_id='".$v3."' ,p_img='".$v4."'  WHERE p_id='".$v."'";

            if ($this->dbConnection->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " .$this->dbConnection->query($sql)->error;
            }

        
        //////////////////////////////////////////////////////////Update Name/////////////////////////////////////////////////

       
      }
//////  //  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////Function Delete Product TYpe of Method is Post////////////////////////////////
public function  delete_product($v){

    $sql = "DELETE FROM products WHERE p_id='".$v."'";
    if ( $this->dbConnection->query($sql) === TRUE) {
        echo " successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $this->dbConnection->query($sql)->error;
    }}
    /////////////////////////////////////////////////Function Get Products Post Method/////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function Get_Products(){
    $sql = "select * from products";

    $result = $this->dbConnection->query($sql);
    return $result;

}
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////Function Get Specific Product (Search)///////////////////////////////////////////////////
  public  function Search_product($value){
        //////////////////////////////////////////Search using Product Id////////////////////////////////////////////////////////////////
        $sql = "select * FROM products where p_id='".$value."'";
        $result=$this->dbConnection->query($sql);
        return $result;

   

  }
    /////////////////////////////////////////////////////Get Name of Product//////////////////////////////////////////////////////////////
  public  function get_PName(){

        $sql = "Select p_name FROM products where p_id='".$_POST["p_id"]."'";

        if ( $this->dbConnection->query($sql)->query($sql) === TRUE) {
            echo "Query success";
            $result = $this->dbConnection->query($sql)->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    return $row["p_name"];
                }
            } else {

                return 0;

        }}
        else {
            echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
        }



    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
   public function checkstatus($value){
    $sql="select status from products where p_id='".$value."'";
     $result=$this->dbConnection->query($sql);
     return $result;
 }
 ///////////////////////////////////////////////////////////////////////////////////////////
 public function changestatus($id,$value){
$sql = "UPDATE products SET  status='".$value."' where p_id='".$id."'";
$result=$this->dbConnection->query($sql);
return$result;
 } 


}
