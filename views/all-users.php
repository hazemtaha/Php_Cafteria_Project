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
        <li><a href="#">Products</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Manual Order</a></li>
        <li><a href="#">Checks</a></li>
        <li><a href="#">All Products</a></li>
       
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
<div align="center"><h1 style="color:Salmon ;font-style: oblique;"> All Users</h1></div>
<br>

    <table class="table table-condensed" align="center">
        <thead>
        <tr bgcolor="AntiqueWhite ">
            <th>Name</th>
        <th>Room</th>
        <th>image</th>
        <th>Ext.</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        

        <?php

         require_once "../controllers/DbConnection.php";
        require_once "../controllers/user.php";
        $pro = new user(DbConnection::getConnection("localhost","aya","aya","cafteria"));
        $result = $pro->dispaly_users();

      if ($result->num_rows > 0) 
      {
        while($row = $result->fetch_assoc()) 
        {    
          echo '<tr>
               <td>'.$row["u_name"].'</td>
               <td>'.$row["room_no"].'</td>';
          echo "<td><img src='../assets/img/".$row['u_img']."' width='30' height='30'/></td>";
          echo  '<td>'.$row["ext"].'</td>
                 <td><a href="../views/edituser1.php?id='.$row['u_id'].'">Edit</a> 
                 <a href="../models/deleteuser.php?id='.$row['u_id'].'">Delete</a></td>
          </tr>';
        }  
      }  
      else 
      {
          echo "0 results";
      }


        ?>
        </tbody>
        </table>
</div>
<div class="col-sm-1"></div>

</div>

 </div>   

<br>
<div class=" row  text-center" background="Black">
      <div class="well">Insititute of Information and Technology </div>
</div>




 
 
</body>

</html>
