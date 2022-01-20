<?php
include('includes/sourcesCSS.php');

if(isset($_POST['addproduct'])){
    
  
    $conn= new mysqli("localhost","root","","eshtrely");
     if (!$conn){
    die("connection failed:".mysql_connect_error());
}
    $sql= "INSERT INTO products (productname,productid,productprice,rating,quantity,producttype,productimage) VALUES ('".$_POST['name']."','".$_POST['id']."','".$_POST['price']."','".$_POST['rating']."','".$_POST['quantity']."','".$_POST['type']."','".$_FILES['productimage']['name']."')";
    $result= mysqli_query($conn,$sql);
     if($result)
     {
         echo "<alert style='margin-top:20px;' class='form-control alert alert-success justify-content-center'> <i class='far fa-check-circle'></i>Product Created Succesfuly</alert>";
         $target_dir="../images/products";
        $target_file=$target_dir.basename($_FILES['productimage']['name']);
        $uploadOk=1;
        
        if(file_exists($target_file))
        {
    echo "sorry file doesnt exist";
    $uploadOk=0;
        }
    if($uploadOk==0)
    {
        echo "sorry your file is not uploaded";
    }
    else{
        if(move_uploaded_file($_FILES["productimage"]["tmp_name"],$target_file))
        {
            echo "the file has been uploaded";
        }
        else{
            echo "sorry there was an error";
        }
       }
         header("Location:products.php");
     }
     else
     {
         echo "error";
     }
    }
    ?>
 <?php
    include('includes/sidebar.php');
    include('includes/navbar.php');

?>
<link rel="stylesheet" href="../css/adduser.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   
    <div class="container ">
    <!-- <h3><b> Add User</b></h3> -->
    <form  action="" method="post" class="form-group f" enctype="multipart/form-data" onsubmit="return validate()">
        
<input type="text" placeholder="Product Name" name="name" class="form-control" id="name">
<div id="nameerror"></div>
<input type="text" placeholder="Product ID" name="id" class="form-control" id="id">
<div id="iderror"></div>
<input type="text" placeholder="Price" name="price" class="form-control" id="price">
<div id="priceerror"></div>
<input type="text" placeholder="Rating" name="rating" class="form-control"id="rating">
<div id="ratingerror"></div>
<input type="text" placeholder="Type" name="type" class="form-control"id="type">
<div id="typeerror"></div>

<input type="text" placeholder="Quantity" class="form-control" id="quantity" name="quantity">
<div id="quantityerror"></div><br>

<b id="uploadtext">Upload the product image:<b><br>
<input type="file" name="productimage"  class="ProfilePhoto">
<input type="submit" value="Add Product" name="addproduct" class="btn btn-success signupbtn" class="form-control addbtn">
    </form>
</div>



<script>
function validate()
{
    var product_name=document.getElementById('name').value;
    var product_id = document.getElementById('id').value ;
    var product_price=document.getElementById('price').value;
    var product_rating=document.getElementById('rating').value;
    var product_quantity = document.getElementById('quantity').value;
    var product_type = document.getElementById('type').value;
   
  if(product_name == '' || product_id =='' || product_price ==''|| product_rating ==''|| product_quantity =='' || product_type==''){
    
        if(product_name == ''){
            document.getElementById('nameerror').innerHTML = 'Name is Required';
            
        } 
        else{
          document.getElementById('nameerror').innerHTML='';
        }
      
        if(product_id == ''){
            document.getElementById('iderror').innerHTML = 'ID is Required';
            
        } 
        else{
          document.getElementById('iderror').innerHTML='';
        }
      

        if(product_price == ''){
            document.getElementById('priceerror').innerHTML = 'Price is Required';
            
        } 
        else{
          document.getElementById('priceerror').innerHTML='';
        }
      

    
      if(product_rating == ''){
            document.getElementById('ratingerror').innerHTML = 'Rating is Required';
            
        } 
        else{
          document.getElementById('rating error').innerHTML='';
        }
        

        if(product_quantity =='')
        {
            document.getElementById('quantityerror').innerHTML = 'Quantity is Required';
        }
        else{
          document.getElementById('quantityerror').innerHTML='';
        }

        if(product_type =='')
        {
            document.getElementById('typeerror').innerHTML = 'Type is Required';
        }
        else{
          document.getElementById('typeerror').innerHTML='';
        }
        
        
        return false;
    
    }else{
       
        return true;
    }
}


</script>
</body>
    <!-- End of Main Content -->
  
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
   <?php
include('includes/sourcesJS.php');
   ?>
<!-- <script src="../js/jquery.js"></script> -->
<!-- <script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script> -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</html>