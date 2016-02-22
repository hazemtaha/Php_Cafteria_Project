<html lang="en">
<head>
  <title>Edit Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../assets/js/getUserInfo.js"></script>

</head>
<body>

<div class="col-sm-12">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">ITI Cafeteria</a>
      </div>
      <ul class="nav navbar-nav">
            <li class="active"><a href="orders.html">Home</a></li>
            <li class="active"><a href="Show_Products.php">Products</a></li>
            <li class="active"><a href="all-users.php">Users</a></li>
            <li class="active"><a href="AdminMainPage.html">Manual Orders</a></li>
            <li class="active"><a href="checks.html">Checks</a></li>


        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><img src="" width="50" height="50" id="userImg" /> </li>
            <li><a href="#" id="userName"></a></li>
            <li><a href="../controllers/logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
</div>



<br> <br> <br> <br>


  <div class="col-sm-11" >
    <h1> Edit Users </h1>
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
            echo '<form role="form" action="../models/edituser.php?id='.$_GET['id'].'" method="post" enctype="multipart/form-data">';
                   
                echo "<div class='form-group'>";
                    
                       require_once "../controllers/DbConnection.php";
                       require_once "../controllers/user.php";
                       $pro = new user(DbConnection::getConnection());
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


</body>
</html>
