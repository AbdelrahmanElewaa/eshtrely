<?php
include('includes/sourcesCSS.php');
include('includes/sidebar.php');
include('includes/navbar.php');


?>

<!-- Content Wrapper. Contains page content -->
<title>Orders</title>
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <!--    search orders -->

 <div class="topnav">
 
    <div class="search-container">
        
    <form method='get' action='searchorders.php'>
      <input type="text" placeholder="Search order" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>

    </form>
    </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- dah elhnktb feh elmain things-->
    <table class="table" >
        <thead class="thead-dark text-center">
           
 |<th>serial NO.</th>         
<th>User ID</th>
<th>Product ID</th>
<th>Quantity</th>

<th>Order ID</th>
</thead>


<tbody class="text-center">

<?php
$conn= new mysqli("localhost","root","","eshtrely");

if (!$conn){
  die("connection failed:".mysql_connect_error());
}
$sql= "SELECT * FROM orders";
$result=mysqli_query($conn,$sql);
$rows=$result->num_rows;
for($i=0;$i<$rows;$i++)
{
    $row= $result->fetch_array(MYSQLI_NUM);
    echo "<tr>";
    echo"<td>".($i+1)."</td>";
    echo "<td >'".$row[0] ."'</td>" ;
    for($j=1;$j<4;$j++)
          {
        echo "<td>".$row[$j]."</td>";
           }
           // echo"<td> <a href='adminEditProduct.php?productid=".$row[2]."'><i class='fas fa-edit'>  </i></a>   <a href='adminDeleteProduct.php?productid=".$row[2]."'><i class='fas fa-trash'></i></a> </td>"; 
    echo"</tr>";
}


?>
</tbody>
</table >
  

    <!-- /.content -->
  </div>
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