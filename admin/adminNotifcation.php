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
            <h1 class="m-0">Notifcations</h1>
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
 <table class="table">
  <?php
$conn= new mysqli("localhost","root","","eshtrely");

if (!$conn){
  die("connection failed:".mysql_connect_error());
}
 

// getting the sender id
// $sql= "SELECT message FROM messages WHERE receiver=0 and sender='".$_GET['id']."' ";
$sql= "SELECT  message,createdAt From messages WHERE sender = -1 AND receiver ='".$_SESSION['id']."'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0) {
    $rows=$result->num_rows;
  
    for($i=0;$i<$rows;$i++)
    {
        $senderMessages= mysqli_fetch_array($result); 
        echo "<tr class='bg-danger'>";
        for($j=0;$j<1;$j++)
        {
     
            echo"<td><b>HR:</b>".$senderMessages[0]."</td>";
            echo "<td>".$senderMessages[1]."</td>";
            echo"<br>";
        }
        echo "</tr>";
    }

}
else{

    echo"<h2>No Messages has been send</h2>";
}

?>
</table>
 
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