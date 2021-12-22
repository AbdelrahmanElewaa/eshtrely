<?php
include('includes/sourcesCSS.php');
include('includes/sidebar.php');
include('includes/navbar.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
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
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- dah elhnktb feh elmain things-->
    <table class="table" >
        <thead class="thead-dark text-center">
            |<th>serial NO.</th>
            <th>Profile Picture</th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Phone</th>
<th>Address</th>
<th>Role</th>
<th>Modify</th>
</thead>


<tbody class="text-center">

<?php
$conn= new mysqli("localhost","root","","eshtrely");
$sql="SELECT photo,name,email,password,phone,address,role,id FROM users";
$result=mysqli_query($conn,$sql);
$rows=$result->num_rows;
for($i=0;$i<$rows;$i++)
{
    $row= $result->fetch_array(MYSQLI_NUM);
    echo "<tr>";
    echo"<td>".($i+1)."</td>";
    echo "<td ><img style='width:90px; height:90px; background-size: cover; object-fit: cover;'src='../images/".$row[0] ."'</td>" ;
    for($j=1;$j<7;$j++)
          {
        echo "<td>".$row[$j]."</td>";
           }
           echo"<td> <a href='adminEditUser.php?userid=".$row[7]."' type='submit'  ><i class='fas fa-edit'>  </i></a>   <a href='adminDeleteUser.php?userid=".$row[7]."'><i class='fas fa-trash'></i></a> </td>"; 
    echo"</tr>";
}


?>
</tbody>
</table >
  
<?php
include('includes/sourcesJS.php');
?>

    <!-- /.content -->
  </div>
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
   
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</html>