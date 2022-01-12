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
            <h1 class="m-0">Chat</h1>
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
// $sql= "SELECT message FROM messages WHERE receiver=0 and sender='".$_GET['id']."' ";
$sql= "SELECT  message From messages WHERE sender = '".$_GET['id']."' AND receiver =0 OR sender =0 AND receiver = '".$_GET['id']."'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0) {
    $rows=$result->num_rows;
  
    for($i=0;$i<$rows;$i++)
    {
        $senderMessages= mysqli_fetch_array($result); 
        for($j=0;$j<1;$j++)
        {
     
            echo"<p>".$senderMessages[$j]."</p>";
            echo"<br>";
        }
        
    }

}
else{
    echo"<h2>No Messages has been send</h2>";
}

if(isset($_POST['send']))
{

     
	$createdAt = date("Y-m-d h:i:sa");
	$sender =0;
	$receiver = $_GET['id'];
	$message = $_POST['message'];
	$sendMessage = "INSERT INTO messages(sender,receiver,message,createdAt) VALUES('$sender','$receiver','$message','$createdAt')";
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
}
?>

<form   action="" method="post" enctype="multipart/form-data">
  
  <div class="form-group">
    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="How Can the Admin Help You!!"
    style="width:600px; height:300px; margin-left:30px; background-color:lightgrey;"></textarea>
  </div>

  <div class="form-group">
  <input type="file" style="margin-left:220px"name="photo"  class="ProfilePhoto"><br>
  <input type="submit" style="margin-left:300px" value="Send" name="send" class="btn btn-dark signupbtn" class="form-control">
</div>

</form>
<?php
include('includes/sourcesJS.php');
?>

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
   
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</html>