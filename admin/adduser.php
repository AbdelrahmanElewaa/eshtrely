<?php
include('includes/sourcesCSS.php');

if(isset($_POST['adduser'])){
    
  
    $conn= new mysqli("localhost","root","","eshtrely");
    if (!$conn){
    die("connection failed:".mysql_connect_error());
}
     
    $sql= "INSERT INTO users (name,email,phone,address,password,role,photo) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['password']."','".$_POST['role']."','".$_FILES['photo']['name']."')";
    $result= mysqli_query($conn,$sql);
     if($result)
     {
         echo "<alert style='margin-top:20px;' class='form-control alert alert-success justify-content-center'> <i class='far fa-check-circle'></i>Account Created Succesfuly</alert>";
         $target_dir="../images/";
        $target_file=$target_dir.basename($_FILES['photo']['name']);
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
        if(move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file))
        {
            echo "the file has been uploaded";
        }
        else{
            echo "sorry there was an error";
        }
       }
         header("Location:users.php");
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
            <h1 class="m-0">Add User</h1>
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
   
    <div class="container ">
    <!-- <h3><b> Add User</b></h3> -->
    <form  action="" method="post" class="form-group f" enctype="multipart/form-data" onsubmit="return validate()">
        
<input type="text" placeholder="Full Name" name="name" class="form-control" id="name">
<div id="nameerror"></div>
<input type="email" placeholder="Email Address" name="email" class="form-control" id="email">
<div id="emailerror"></div>
<input type="text" placeholder="Phone Number" name="phone" class="form-control" id="phone">
<div id="phoneerror"></div>
<input type="text" placeholder="Address" name="address" class="form-control"id="address">
<div id="addresserror"></div>

<input type="password" placeholder="Password" name="password" class="form-control" id="password">
<div id="passworderror"></div>

<input type="text" placeholder="Role" class="form-control" id="role" name="role">
<div id="roleerror"></div><br>

<b id="uploadtext">Upload your profile photo:<b><br>
<input type="file" name="photo"  class="ProfilePhoto">
<input type="submit" value="Add User" name="adduser" class="btn btn-success signupbtn" class="form-control addbtn">
    </form>
</div>



<script>
function validate()
{
    var user_name=document.getElementById('name').value;
    var user_email = document.getElementById('email').value ;
    var user_phone=document.getElementById('phone').value;
    var user_address=document.getElementById('address').value;
    var user_pass = document.getElementById('password').value;
    var user_role = document.getElementById('role').value;
   
  if(user_name == '' || user_email =='' || user_phone ==''|| user_address ==''|| user_pass ==''|| user_role==''){
    
        if(user_name == ''){
            document.getElementById('nameerror').innerHTML = 'Full Name is Required';
            
        } 
        else{
          document.getElementById('nameerror').innerHTML='';
        }
      
        if(user_email == ''){
            document.getElementById('emailerror').innerHTML = 'Email is Required';
            
        } 
        else{
          document.getElementById('emailerror').innerHTML='';
        }
      

        if(user_phone == ''){
            document.getElementById('phoneerror').innerHTML = 'Phone is Required';
            
        } 
        else{
          document.getElementById('phoneerror').innerHTML='';
        }
      

    
      if(user_address == ''){
            document.getElementById('addresserror').innerHTML = 'Address is Required';
            
        } 
        else{
          document.getElementById('addresserror').innerHTML='';
        }
        

        if(user_pass =='')
        {
            document.getElementById('passworderror').innerHTML = 'Password is Required';
        }
        else{
          document.getElementById('passworderror').innerHTML='';
        }

        if(user_role =='')
        {
            document.getElementById('roleerror').innerHTML = 'Role is Required';
        }
        else{
          document.getElementById('roleerror').innerHTML='';
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