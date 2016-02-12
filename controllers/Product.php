t<?php
include DbConnection;
/**
 * Created by PhpStorm.
 * User: ayasharafelden
 * Date: 2/11/16
 * Time: 7:29 AM
 */
class Product
{
    ///////Add Product to product table post method////////////////////////////////////////////////////////
    ////////////////////asking for something we need in product table to enter the name of category not the id
    function insert_product(){
        DbConnection::getConnection();
        $sql = "INSERT INTO products (p_name,u_price,ctg_id,p_img);
                 VALUES ('".$_POST["p_name"]."', '".$_POST["u_price"]."', '".$_POST["ctg_id"]."','".$_POST["p_img"]."')";


        if ( DbConnection::getConnection()->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
        }
    }
    /////////////////////////////////////////////////////////Second function/////////////////////////////////////////////////
    ///////////////////////////////////////////disable status///////////////////////////////////////////////////////////////
    function disable_status(){
        ///////////////////post id of user and product status post method
        $sql = "UPDATE orders SET  status='".$_POST["p_status"]."' WHERE id='".$_POST["u_id"]."'";

        if (DbConnection::getConnection()->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . DbConnection::getConnection()->error;
        }


      DbConnection::closeConnection();


    }
    //////////////////////////////////////////////////////////Third Function///////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////Update Product post method////////////////////////////////////////////////////////
    function update_product(){
        //////////////////////////////////////update by name////////////////////////////////////////////////////////////////
        //////////////////////////////////////if will update price////////////////////////////////////////////////////////
        if($_POST["u_price"]){
            $sql = "UPDATE product SET  u_price='".$_POST["u_price"]."' WHERE id='".$_POST["p_id"]."'";

            if (DbConnection::getConnection()->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . DbConnection::getConnection()->error;
            }
            DbConnection::closeConnection();
        }
        //////////////////////////////////////////////////////////Update Name/////////////////////////////////////////////////

       else if($_POST["p_name"]){
            $sql = "UPDATE products SET  p_name='".$_POST["p_name"]."' WHERE id='".$_POST["p_id"]."'";

            if (DbConnection::getConnection()->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . DbConnection::getConnection()->error;
            }
            DbConnection::closeConnection();
        }
       ////////////////////////////////////////////////////////Update Product Image///////////////////////////////
        else if($_POST["p_img"]){
            $sql = "UPDATE products SET  p_img='".$_POST["p_img"]."' WHERE id='".$_POST["p_id"]."'";

            if (DbConnection::getConnection()->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . DbConnection::getConnection()->error;
            }
            DbConnection::closeConnection();
          }
      }
//////  //  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////Function Delete Product TYpe of Method is Post////////////////////////////////
function  delete_product(){
    DbConnection::getConnection();
    $sql = "DELETE FROM products WHERE p_id='".$_POST["p_id"]."'";
    if ( DbConnection::getConnection()->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
    }}
    /////////////////////////////////////////////////Function Get Products Post Method/////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function Get_Products(){
    DbConnection::getConnection();
    $sql = "Select * FROM products";
    if ( DbConnection::getConnection()->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
    }

}
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////Function Get Specific Product (Search)///////////////////////////////////////////////////
    function Search_product(){
        //////////////////////////////////////////Search using Product Id////////////////////////////////////////////////////////////////
        if($_POST["p_id"]){
        DbConnection::getConnection();
        $sql = "Select * FROM products where p_id='".$_POST["p_id"]."'";
        if ( DbConnection::getConnection()->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
        }}
        //////////////////////////////////////////////////Search using Category////////////////////////////////////////////////////////
       else if($_POST["ctg_id"]){
            DbConnection::getConnection();
            $sql = "Select * FROM products where ctg_id='".$_POST["ctg_id"]."'";
            if ( DbConnection::getConnection()->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
            }
       }
       else if($_POST["p_name"]){
           DbConnection::getConnection();
           $sql = "Select * FROM products where p_name='".$_POST["p_name"]."'";
           if ( DbConnection::getConnection()->query($sql) === TRUE) {
               echo "New record created successfully";
           } else {
               echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
           }
       }

  }
    /////////////////////////////////////////////////////Get Name of Product//////////////////////////////////////////////////////////////
    function get_PName(){
        DbConnection::getConnection();
        $sql = "Select p_name FROM products where p_id='".$_POST["p_id"]."'";
        if ( DbConnection::getConnection()->query($sql) === TRUE) {
            echo "New record created successfully";

        } else {
            echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
        }



    }


}
