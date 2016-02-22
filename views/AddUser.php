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

    <title>Add User</title>
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

<br> <br>
<div align="center">
<h1 style="color:Salmon ;font-style: oblique;"> Add Users </h1>
</div>

<br> <br>
<div class="container">

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
                              

                               if($_GET["id"]==1){

                                  echo "<label id='wpass' style='color:red'>Password and Confirm Password is not Equal</label>";

                                }
                                
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
                               <br>
                             <?php
                               if($_GET["id"]==2){

                                  echo "<label id='wroom' style='color:red'>It must be number</label>";

                                 }?>
                             
                    </div>
<div class="form-group">
                        <label class="control-label" >Ext.</label>
                        <input class="form-control" id="Ext" placeholder="Ext"
                               type="text" name="ext" required>
                              
                                <?php
                               if($_GET["id"]==3){

                                  echo "<label id='wexit' style='color:red'>It must be number</label>";

                                 }?>
                             
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
</div>

<br> <br>

  <br> <br> 
 <div class="footer text-center" background="Black">
      <div class="well">Insititute of Information and Technology </div>


</body>
</html>
