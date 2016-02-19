<?php
//require "DbConnection.php";


/**
 * Created by PhpStorm.
 * User: ayasharafelden
 * Date: 2/12/16
 * Time: 6:39 AM
 */
class Category
{
    private $dbConnection;
    ///////Add Product to product table post method////////////////////////////////////////////////////////
    function __construct(mysqli $dbCon)
    {
        ////////////////////asking for something we need in product table to enter the name of category not the id
        $this->dbConnection = $dbCon;
    }

    public  function insert_product(){
        $sql = "INSERT INTO category (ctg_name)
                 VALUES ('".$_POST["ctg_name"]."')";


        if ($this->dbConnection->query($sql) === TRUE) {
            //echo "insert";

            header("location: ../views/Add_product.php");

        } else {
            echo "Error: " . $sql . "<br>" . $this->dbConnection->query($sql)->error;
        }
    }

    public function Select_categories(){
         $sql = "select * from category";

          $result = $this->dbConnection->query($sql);
         // echo $result;
    return $result;

    }

}
    
//$pro = new Category(DbConnection::getConnection("localhost","aya","aya","cafteria"));

//$result = $pro->Select_categories();

//var_dump($result->fetch_assoc());
        
