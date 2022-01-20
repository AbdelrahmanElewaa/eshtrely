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

if (!$conn){
  die("connection failed:".mysql_connect_error());
}
if(isset($_POST['send']))
{

     
	$createdAt = date("Y-m-d h:i:sa");
	$sender =$_SESSION['id'];
  $senderName=$_SESSION['name'];
	$receiver = 29;
	$message = $_POST['message'];
	$sendMessage = "INSERT INTO messages(sender,senderName,receiver,message,createdAt) VALUES('$sender','$senderName','$receiver','$message','$createdAt')";
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
}

 

// getting the sender id
// $sql= "SELECT message FROM messages WHERE receiver=0 and sender='".$_GET['id']."' ";
$sql= "SELECT  message,createdAt,sender,senderName From messages WHERE sender = '".$_SESSION['id']."' AND receiver =29 OR (sender=29 and receiver = '".$_SESSION['id']."') ORDER BY createdAt asc";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0) {
    $rows=$result->num_rows;
  echo"<table class='table' style='width:700px'>";
    for($i=0;$i<$rows;$i++)
    {
     
        $senderMessages= mysqli_fetch_array($result); 
       
       
      
          if($senderMessages[2]==0 || $senderMessages[2]== $_SESSION['id']  )
          {
            echo"<tr class='bg-dark'>";
            echo"<td class='bg-dark'><b>".$senderMessages[3]."(Auditor)</b></td>";
            echo"<td>".$senderMessages[0]."</td>";
            echo"<td>".$senderMessages[1]."</td>";
          }
          
          else{
            echo"<tr class='bg-danger'>";
            echo"<td ><b>".$senderMessages[3]."(HR)</b></td>";
            echo"<td>".$senderMessages[0]."</td>";
            echo"<td>".$senderMessages[1]."</td>";
          }
          
           
        // }
        echo "</tr>";
        
    }
    echo"</table>";

}
else{
    echo"<h2>No Messages has been send</h2>";
}



?>

<form   action="" method="post" enctype="multipart/form-data" >
  
  <div class="form-group">
    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="How Can the Admin Help You!!"
    style="width:600px; height:300px; margin-left:30px; background-color:lightgrey;"></textarea>
  </div>

  <div class="form-group">
  <input type="file" style="margin-left:220px"name="photo"  class="ProfilePhoto"><br>
  <input type="submit" style="margin-left:300px" value="Send" name="send" class="btn btn-dark signupbtn" class="form-control">
</div>

</form>
<br>
<?php
include('includes/sourcesJS.php');
?>


  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
   
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</html>