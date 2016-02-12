<?php

/**
 * Created by PhpStorm.
 * User: ayasharafelden
 * Date: 2/12/16
 * Time: 6:39 AM
 */
class Category
{
    ////////////////////////////////////////////Return name of Category/////////////////////////////////////////////////////////
function Get_Category_Name(){
    DbConnection::getConnection();
    $sql = "Select ctg_name FROM category where ctg_id='".$_POST["ctg_id"]."'";

    if ( DbConnection::getConnection()->query($sql) === TRUE) {
        echo "Query success";
        $result = DbConnection::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return $row["ctg_name"];
            }
        } else {

            return 0;

        }}
    else {
        echo "Error: " . $sql . "<br>" . DbConnection::getConnection()->query($sql) ->error;
    }






}

}
