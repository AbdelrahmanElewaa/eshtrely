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
            <h1 class="m-0">Inbox</h1>
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

// getting the sender id
$sql= "SELECT DISTINCT sender FROM messages WHERE receiver=0";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 
if(mysqli_num_rows($result) > 0) {
    $rows=$result->num_rows;
  
    

  for($i=0;$i<$rows;$i++)
  {
    $senderID= mysqli_fetch_array($result);
    //getting the data of the sender using the sender id
$getSenderData="SELECT photo,name FROM users WHERE id='".$senderID[0]."'";
$senderDataResult= mysqli_query($conn,$getSenderData) or die(mysqli_error($conn));
$sender= $senderDataResult->fetch_array(MYSQLI_NUM);

                  
  
   echo '<div><img style="margin-left:20px;" src="../images/'.$sender[0].' " class="img-size-50 mr-3 ">';
//  echo '<td><img src="../images/'.$sender[0].' ></td>';
 
    echo "<a href='chat.php?id=".$senderID[0]."'>".$sender[1]."</a></div><br><hr>" ; 
    

  
                 
                  
  }
   
}
else{
    echo"<h2>No Messages has been send</h2>";
}

?>

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