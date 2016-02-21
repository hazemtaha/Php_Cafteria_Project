<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="col-sm-12">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Cafeteria</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Manual Order</a></li>
        <li><a href="#">Checks</a></li>
        <li><a href="#">All Products</a></li>
        <li><img src=""/></li>
        <li><a href="#">Admin</a></li>
      </ul>
    </div>
  </nav>
</div>



<br> <br> <br> <br>


  <div class="col-sm-11" >
    <h1> All Users </h1>
  </div>
  <div class="col-sm-1" >
      <a href="#">Add user</a>
  </div>

<br> <br> <br> <br>

<div class="col-sm-12 table-responsive">
 <table class="table table-condensed">
    <thead>
      <tr>
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
        $pro = new user(DbConnection::getConnection("localhost","zahra","iti","cafteria"));
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
   </form> 
  </table> 
</div>

<br> <br> <br> <br>

<div class=" col-sm-12 text-center">
  <ul class="pagination">
    <li><a href="#">1</a></li>
    <li class="active"><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
  </ul>
 </div>
</body>
</html>
