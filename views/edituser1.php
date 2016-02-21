<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Users</title>
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
    <h1> Edit Users </h1>
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
            echo '<form role="form" action="../models/edituser.php?id='.$_GET['u_id'].'" method="post" enctype="multipart/form-data">';
                   
                echo "<div class='form-group'>";
                    
                       require_once "../controllers/DbConnection.php";
                       require_once "../controllers/user.php";
                       $pro = new user(DbConnection::getConnection("localhost","zahra","iti","cafteria"));
                       $result = $pro->search_user($_GET['id']);
                        if ($result->num_rows == 1) {
                          
                                while($row = $result->fetch_assoc()) 
                                {
                               echo "<tr> <td>
                               <input class='form-control' value='".$row["u_name"]."'
                               type='text' name='u_name'> </td>";
                               echo "<td> <input class='form-control' value='".$row["room_no"]."'
                               type='text' name='room_no'>
                               </td>";
                              echo "<td> <input class='form-control' name='pic' type='file' value='/img/".$row['u_img']."' width='30' height='30'/></td>";

                              echo "<td> <input class='form-control' name='ext' value='".$row["ext"]."' </td> ";
                              echo "<td> <button type='submit'>Submit</button> </td> </tr> ";
                                }
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
