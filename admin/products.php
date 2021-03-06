<?php
include('includes/sourcesCSS.php');
include('includes/sidebar.php');
include('includes/navbar.php');


?>


<!-- Content Wrapper. Contains page content -->
<title>Products</title>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
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

    <!-- Add product -->

    <a href="addproduct.php" style="font-size:15px; margin-right:30px; margin-bottom:15px; float:right; color:red;"><i class="fas fa-laptop-medical"></i> Add Product</a>


    <!---->

    <!-- Main content -->
    <!-- dah elhnktb feh elmain things-->
    <table class="table" >
        <thead class="thead-dark text-center">
            |<th>serial NO.</th>
          
<th>Image</th>
<th>Name</th>
<th>ID</th>
<th>Price</th>
<th>Type</th>
<th>Rating</th>
<th>Quantity</th>
<th>Modify</th>
</thead>


<tbody class="text-center">

<?php
$conn= new mysqli("localhost","root","","eshtrely");
if (!$conn){
  die("connection failed:".mysql_connect_error());
}
$sql="SELECT productimage,productname,productid,productprice,producttype,rating,quantity FROM products";
$result=mysqli_query($conn,$sql);
$rows=$result->num_rows;
for($i=0;$i<$rows;$i++)
{
    $row= $result->fetch_array(MYSQLI_NUM);
    echo "<tr>";
    echo"<td>".($i+1)."</td>";
    echo "<td ><img style='width:90px; height:90px; background-size: cover; object-fit: cover;'src='../images/products/".$row[0]."'</td>" ;
    for($j=1;$j<7;$j++)
          {
        echo "<td>".$row[$j]."</td>";
           }
           echo"<td> <a href='adminEditProduct.php?productid=".$row[2]."'><i class='fas fa-edit'>  </i></a>   <a href='adminDeleteProduct.php?productid=".$row[2]."'><i class='fas fa-trash'></i></a> </td>"; 
    echo"</tr>";
}


?>
</tbody>
</table >
  

    <!-- /.content -->
   
  <!-- /.content-wrapper -->
  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<?php
include('includes/sourcesJS.php');
?>
   
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</html>