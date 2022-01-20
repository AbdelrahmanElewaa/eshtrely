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
            <h1 class="m-0">Admin Contacted With</h1>
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

    <?php
$conn= new mysqli("localhost","root","","eshtrely");
if (!$conn){
  die("connection failed:".mysql_connect_error());
}
$viewAdminSQL="SELECT photo,name FROM users WHERE id='".$_GET['adminid']."'";
$viewAdminResult=mysqli_query($conn,$viewAdminSQL);
$adminInfo= $viewAdminResult->fetch_array(MYSQLI_NUM);
?>
<b style="margin-left:10px; font-size:20px;">Admin:</b><br>
<div class="card" style="width: 7rem; margin-left:10px; height:30px;">

  <?php echo '<img class="card-img-top" src="../images/'.$adminInfo[0].'" alt="Card image cap">
  
  <p class="card-text text-center justify-content-center ">'.$adminInfo[1].'</p>';
  ?>
</div>
 
<!-- end add user -->
    <!-- Main content -->
    <!-- dah elhnktb feh elmain things-->
    <table class="table" style="margin-top:110px;" >
        <thead class="thead-dark text-center">
            |<th>serial NO.</th>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Go to Chat</th>
</thead>


<tbody class="text-center">

<?php


$customerSQL="SELECT DISTINCT receiver FROM messages WHERE sender=0 ";
$customerResult=mysqli_query($conn,$customerSQL);
$customerRows=$customerResult->num_rows;
for($k=0;$k<$customerRows;$k++)
{
    $cRow= $customerResult->fetch_array(MYSQLI_NUM);
$sql="SELECT photo,name,id FROM users WHERE id='$cRow[0]' and role='customer' ";
$result=mysqli_query($conn,$sql);
$rows=$result->num_rows;
for($i=0;$i<$rows;$i++)
{
    $row= $result->fetch_array(MYSQLI_NUM);
    echo "<tr>";
    echo"<td>".($i+1)."</td>";
    echo "<td ><img style='width:90px; height:90px; background-size: cover; object-fit: cover;'src='../images/".$row[0] ."'</td>" ;
         echo "<td>".$row[1]."</td>";
         echo"<td> <a href='chatHistory.php?customerID=".$row[2]."&adminID=".$_GET['adminid']."&customerName=".$row[1]."&adminName=".$adminInfo[1]."' type='submit' class='btn btn-success'>View Chat History</a> </td>";
        
    echo"</tr>";
}
}

?>
</tbody>
</table >
  
<?php
include('includes/sourcesJS.php');
?>

    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
 
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
   
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</html>