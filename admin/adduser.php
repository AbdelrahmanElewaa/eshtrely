<?php
include('includes/sourcesCSS.php');

 
include('includes/sidebar.php');
include('includes/navbar.php');

$conn= new mysqli("localhost","root","","eshtrely");
if (!$conn){
    die("connection failed:".mysql_connect_error());
}
 




  
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
 <style>

.error{
  color:red;
}
</style>
    <!-- Main content -->
   

    <div class="container">

<form action="" method="post" class="form-group" enctype="multipart/form-data" onsubmit="return validate()">
    
<input type="text" placeholder="Full Name" name="name" class="form-control" id="name">
<div id="nameerror"></div>

<input type="email" placeholder="Email Address" name="email" class="form-control" id="email" >
<div id="emailerror" class="error"></div>
<div id="emailexists" class="error"></div>
<input type="text" placeholder="Phone Number" name="phone" class="form-control" id="phone" >
<div id="phoneerror"></div>

<input type="text" placeholder="Address" name="address" class="form-control"id="address" >
<div id="addresserror"></div>

<input type="password" placeholder="Password" name="password" class="form-control" id="password" >
<div id="passworderror" class="error"></div>

<select name="role" class="form-control roleselect" id="role" >

<option>admin</option>
<option>customer</option>
<option>auditor</option>
<option>HR</option>
</select>
<div id="roleerror"></div>
<b id="uploadtext">Upload your profile photo:<b><br>
<input type="file" name="photo" id="photo" class="ProfilePhoto"  onchange="return fileValidation()"><br>


<script>
function validate()
{
    var user_name=document.getElementById('name').value;
    var user_email = document.getElementById('email').value ;
    var user_phone=document.getElementById('phone').value;
    var user_address=document.getElementById('address').value;
    var user_pass = document.getElementById('password').value;
    var user_role = document.getElementById('role').value;
   
  if(user_name == '' || user_email =='' || user_phone ==''|| user_address ==''|| user_pass ==''){
    
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

        
        
        return false;
    
    }else{
       
        return true;
    }
}




function fileValidation() {
            var fileInput = 
                document.getElementById('photo');
              
            var filePath = fileInput.value;
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            else 
            {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
</script>


<?php


if(isset($_POST['adminEditSubmit']))
{
  $conn2= new mysqli("localhost","root","","eshtrely");
  $checkemail="SELECT * FROM users WHERE email='".$_POST['email']."'";
 $resultcheck= mysqli_query($conn2,$checkemail);
 if($row=mysqli_fetch_array($resultcheck))
 {
  echo "<script> document.getElementById('emailexists').innerHTML='There is Account with That Email'
  </script>";
 
 }
 else{
   
    if($_FILES['photo']['name']=="")
       {
           $_FILES['photo']['name']="925px-Unknown_person";
       }
       
   $sql= "INSERT INTO users (name,email,phone,address,password,role,photo) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['password']."','".$_POST['role']."','".$_FILES['photo']['name']."')";
   $result= mysqli_query($conn2,$sql);
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

    echo'<div style="margin-top:20px;"class="alert alert-success" role="alert">
    <i class="fas fa-check-circle"></i>User info is Updated Succesfully
  </div> <a value="Go back to table" style="font-size:50px; float:right; color:red;" href="users.php"><i class="fas fa-door-open"></i></a>';

    }
    
   }
}
?>

<input type="submit"name="adminEditSubmit" value="Add User" class="btn btn-primary editbtn" style="margin-top:20px;margin-left:170;">

</form>

</div>

<?php
include('includes/sourcesJS.php');

?>
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