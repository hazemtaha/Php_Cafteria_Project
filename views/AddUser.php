<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
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

<br> <br>

<h1> Add Users </h1>

<br> <br>

<div class="row" class="table-responsive">
  <form role="form" action="../models/img.php" method="post" enctype="multipart/form-data">
 <div class="form-group">
                        <label class="control-label" >Name</label>
                        <input class="form-control" id="Name" placeholder=" Name"
                               type="text" name="u_name" required>
                    </div>
   <div class="form-group">
                        <label class="control-label" >Email</label>
                        <input class="form-control" id="email" placeholder="Email"
                               type="email" name="u_email" required>
                    </div>
   <div class="form-group">
                        <label class="control-label" >Password</label>
                        <input class="form-control" id="pass" placeholder="Password"
                               type="password" name="u_pass" required>
                               <br>
                               <?php
                               echo $_GET["id"];

                               if($_GET["id"]==1){

                                  echo "<label id='wpass' style='color:red'>Password and Confirm Password is not Equal</label>";

                                }
                                else
                                    echo"wrong";

                               ?>
                              
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Conf Password</label>
                        <input class="form-control" id="con-pass" placeholder="Confirm Password"
                               type="password" name="con_pass" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Room No</label>
                        <input class="form-control" id="room_no" placeholder="Room No"
                               type="text" name="u_room" required>
                               <label id="wroom"></label>
                    </div>
<div class="form-group">
                        <label class="control-label" >Ext.</label>
                        <input class="form-control" id="Ext" placeholder="Ext"
                               type="text" name="ext" required>
                               <label id="wext"></label>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Select Image</label>
                        <input class="form-control" id="img" 
                               type="file" name="pic" required>
                    </div>
                    <br>
                    <button type="submit" class="active btn btn-default btn-lg">Submit</button>
  </form>
</div>

<br> <br>

 <div class=" row col-sm-12 text-center">
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
