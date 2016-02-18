<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    </title>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
<script>











</script>
<body>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="nav nav-pills">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Products</a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li>
                        <a href="#">Manual Orders</a>
                    </li>
                    <li>
                        <a href="#">Checks</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-1" id="userPic">
                <i class="fa fa-3x fa-fw fa-user pull-left text-muted"></i>
            </div>
            <div class="col-md-1 text-center">
                <p class="lead text-center">Admin
                    <br>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Product</h1>
                 <?php
                echo '<form role="form" action="editProduct.php?id='.$_GET['id'].'" method="post" enctype="multipart/form-data">';
                   
                    echo "<div class='form-group'>";
                    
                       require_once "DbConnection.php";
                       require_once "Product.php";
                       $pro = new Product(DbConnection::getConnection("localhost","aya","aya","cafteria"));
                       $result = $pro->Search_product($_GET['id']);
                        if ($result->num_rows == 1) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row["ctg_id"]."'>".$row["ctg_name"]."</option>";
                                   echo "<label class='control-label' >Product</label>";
                      echo "<input class='form-control' id='product' value='".$row["p_name"]."'
                               type='text' name='p_name'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                       echo " <label class='control-label'>Price</label>";
                       echo "<input class='form-control' id='price' type='number' min='0'
                               value='".$row["u_price"]."' name='u_price'>";
                                }
                            } 
                       ?>  
                    </div>
                   
                    <div class="form-group">
                        <a href="Add_Category.html" class="pull-right">Add Category</a>
                        <label class="control-label" for="category">Category</label>
                        <select name="ctg_id" class="form-control" id="category" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
                            <option value="" selected="">Select Category</option>
                           <?php
                            require_once "DbConnection.php";
                            require_once "Category.php";
                            $pro = new Category(DbConnection::getConnection("localhost","aya","aya","cafteria"));

                            $result = $pro->select_categories();
                           
                                    
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                   echo "<option value='".$row["ctg_id"]."'>".$row["ctg_name"]."</option>";
                                }
                            } else {
                                echo "0 results";
                            }
               
                       echo " </select>";
                   
                  
                    ?>
                   </div>
                   <div >
                        <label class="control-label">Select Image</label>
                        <input name="p_img" type="file" class="control-label" id="img">

                    </div>
                    <br/>
                    <br/>
                    <input type="hidden" name="selected_text" id="selected_text" value="" />
                    <button type="submit" class="active btn btn-default btn-lg">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row"></div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row"></div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <footer class="section section-primary">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1>ITI Cafteria</h1>
                                <p>All rights reserved to Gorilla's team :)&nbsp;
                                    <br>Zahra - Aya - Hazem</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-info text-right">
                                    <br>
                                    <br>
                                </p>
                                <div class="row">
                                    <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                                        <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                        <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                        <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                                        <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 hidden-xs text-right">
                                        <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                        <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                        <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                                        <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>

</body>

</html>
