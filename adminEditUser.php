<?php
include('includes/sourcesCSS.php');


$conn1= new mysqli("localhost","root","","eshtrely");
$sql1="SELECT * FROM users WHERE id='".$_GET['userid']."'";
$result1=mysqli_query($conn1,$sql1);
$row1= $result1->fetch_array(MYSQLI_NUM);

if(isset($_POST['adminEditSubmit'])){
    if($_FILES['photo']['name']=="")
       {
           $_FILES['photo']['name']= $row1[7];
       }
   $conn= new mysqli("localhost","root","","eshtrely");
    
   $sql= "UPDATE users set name='".$_POST['name']."' , email='".$_POST['email']."',phone='".$_POST['phone']."', address='".$_POST['address']."',
   password='".$_POST['password']."', photo='".$_FILES['photo']['name']."' , role='".$_POST['role']."' WHERE id='".$_GET['userid']."' ";
   $result= mysqli_query($conn,$sql);
    if($result)
    { 
       // echo "<alert style='margin-top:20px;' class='form-control alert alert-success justify-content-center'> <i class='far fa-check-circle'></i>Account Created Succesfuly</alert>";
        $target_dir="../images/";
       $target_file=$target_dir.basename($_FILES['photo']['name']);
       $uploadOk=1;
       //$imageFileType= strtolower(pathinfo($target_file),PATHINFO_EXTENSION);
       if(file_exists($target_file))
       {
  // echo "sorry file doesnt exist";
   $uploadOk=0;
       }
   if($uploadOk==0)
   {
       //echo "sorry your file is not uploaded";
   }
   else{
       if(move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file))
       {
           //echo "the file has been uploaded";
       }
       else{
           //echo "sorry there was an error";
       }
      }
      
    }
    header("Location:admin.php");
   }
          


?>
 <?php
    include('includes/sidebar.php');
    include('includes/navbar.php');
include('includes/sourcesJS.php');
?>
<link rel="stylesheet" href="../css/admineditform.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User Profile</h1>
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
   

 <div class="container">

<form action="" method="post" class="form-group" enctype="multipart/form-data">
    
<input type="text" placeholder="Full Name" name="name" class="form-control" id="firstinput" <?php echo "value='".$row1[1]."'"; ?>>
<input type="email" placeholder="Email Address" name="email" class="form-control"<?php echo "value='".$row1[2]."'"; ?>>
<input type="text" placeholder="Phone Number" name="phone" class="form-control"<?php echo "value='".$row1[4]."'"; ?>>
<input type="text" placeholder="Address" name="address" class="form-control"<?php echo "value='".$row1[5]."'"; ?>>
<input type="password" placeholder="Password" name="password" class="form-control"<?php echo "value='".$row1[3]."'"; ?>>
 
<select name="role" class="form-control roleselect" <?php echo "value='".$row1[6]."'"; ?> >

<option>admin</option>
<option>customer</option>
</select>
<b id="uploadtext">Upload your profile photo:<b><br>
<input type="file" name="photo"  class="ProfilePhoto"><br>

<input type="submit"  name="adminEditSubmit" value="Save Changes" class="btn btn-primary editbtn">

</form>

</div>
    <!-- End of Main Content -->
  
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
   
<!-- <script src="../js/jquery.js"></script> -->
<!-- <script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script> -->
</html>