<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style >
        .well{
            background-color: black;
        }
        .col-sm-2{

            padding: 10px;
 }
        .shape{
            border: 1px solid Gainsboro  ;
  }
  table{

      


  }


.col-sm-4 {


     border: 1px solid Gainsboro;

}
tr , td{

  padding: 7px;


}

#size{


    border: 1px;
}


    </style>

    <title>Show Products</title>
</head>
<body  style="background-color:Snow ">
<nav class="navbar navbar-inverse ">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="../assets/img/start.jpg" width="50" heigth="50"/>

        </div>
        <div class="navbar-header">

            <a class="navbar-brand" href="#">Cafertaria</a>

        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="active"><a href="#">Products</a></li>
            <li class="active"><a href="#">Users</a></li>
            <li class="active"><a href="#">Manual Orders</a></li>
            <li class="active"><a href="#">Checks</a></li>


        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><img src="../assets/img/start.jpg" width="50" height="50"/> </li>
            
            <li><a href="#">Islam Asker</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
</nav>
<br/>

<div class="row">
<div class="col-sm-1"></div> 
<div class="col-sm-10">
<div align="center"><h1 style="color:Salmon ;font-style: oblique;"> All Products</h1></div>
<br>

    <table class="table table-condensed" align="center">
        <thead>
        <tr bgcolor="AntiqueWhite ">
            <th>Product</th>
            <th>Price</th>
            <th>image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php

        require_once "../controllers/DbConnection.php";
        require_once "../controllers/Product.php";
        $pro = new Product(DbConnection::getConnection("localhost","root","iti","cafteria"));
        $result = $pro->Get_Products();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row['status']==1){
                echo '<tr>';
                    echo '<td>'.$row['p_name'].'</td>';
                    echo '<td>'.$row['u_price'].'</td>';

                   echo "<td><img src='../assets/img/".$row['p_img']."' width='30' height='30'></td>";
                   echo '<td><a href="../models/Available.php?id='.$row['p_id'].'">available</a></td>';

                    echo '<td>
                          <a href="../models/EditProduct.php?id='.$row['p_id'].'">EDIT</a>
                          <a href="../models/deleteProduct.php?id='.$row['p_id'].'">Delete</a> </td>';
                    echo '<tr>';}
                    else{
                         echo '<tr>';
                    echo '<td>'.$row['p_name'].'</td>';
                    echo '<td>'.$row['u_price'].'</td>';

                   echo "<td><img src='../assets/img/".$row['p_img']."' width='30' height='30'></td>";
                    echo '<td><a href="../models/Available.php?id='.$row['p_id'].'">unavailable</a></td>';

                    echo '<td>
                          <a href="../views/EditProduct.php?id='.$row['p_id'].'">EDIT</a>
                          <a href="../models/deleteProduct.php?id='.$row['p_id'].'">Delete</a> </td>';
                    echo '<tr>';
                          




                    }

        }}else {
            echo "0 results";
        }


        ?>
        </tbody>
        </table>
</div>
<div class="col-sm-1"></div>

</div>

 </div>   
<div class=" row col-sm-12 text-center">
        <ul class="pagination">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
 </div>

<br>
<br>
<br>
<br>
<br>
<div class=" row  text-center" background="Black">
      <div class="well">Insititute of Information and Technology </div>
</div>




 
 
</body>

</html>
