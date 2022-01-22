<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signform.css">
    <link rel="stylesheet" href="css/all.min.css">
     <?php
     session_start();
     ?>
<style>
.error
{
    color:red;
}
</style>
</head>
<body>





    <!-- <span class="border border-success"></span> -->
<div class="container border border-success formcontainer ">
    <h3 class="text-center"><b> Edit your Account</b></h3>

    <form  action="" method="post" class="form-group f" enctype="multipart/form-data" onsubmit="return validate()">
<input type="text" placeholder="Full Name" name="name" class="form-control" id="name" <?php echo "value='".$_SESSION['name']."'"; ?>>
<div id="nameerror" class="error"></div>

<input type="email" placeholder="Email Address" name="email" class="form-control" id="email" <?php echo "value='".$_SESSION['email']."'"; ?>>
<div id="emailerror" class="error">

</div>
<div id="emailexists" class="error"></div>

<input type="text" placeholder="Phone Number" name="phone" class="form-control"id="phone" <?php echo "value='".$_SESSION['phone']."'"; ?>>
<div id="phoneerror" class="error">

</div>

<input type="text" placeholder="Address" name="address" class="form-control" id="address" <?php echo "value='".$_SESSION['address']."'"; ?>>
<div id="addresserror" class="error">

</div>

<input type="password" placeholder="Password" name="password" class="form-control" id="password" <?php echo "value='".$_SESSION['password']."'"; ?>>
<div id="passworderror" class="error">

</div><br>

<b id="uploadtext"  style="margin-left:220px">Upload your profile photo:<b><br>
<input type="file" name="photo"  style="margin-left:220px" class="ProfilePhoto" id="photo"  onchange="return fileValidation()"><br>

<input type="submit" value="Save Changes" name="editsubmit" class="btn btn-primary signupbtn" class="form-control" style="margin-left:250px">
    </form>
</div>
<script>
function validate()
{
    var user_name=document.getElementById('name').value;
    var user_email = document.getElementById('email').value ;
    var user_phone=document.getElementById('phone').value;
    var user_address=document.getElementById('address').value;
    var user_pass=document.getElementById('password').value;
   
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
function edituser(){
    if(isset($_POST['editsubmit'])){
   
$conn= new mysqli("localhost","root","","eshtrely");

 $checkemail="SELECT * FROM users WHERE email='".$_POST['email']."' and email != '".$_SESSION['email']."' ";
 $resultcheck= mysqli_query($conn,$checkemail);
 if($row=mysqli_fetch_array($resultcheck))
 {
  echo "<script> document.getElementById('emailexists').innerHTML='There is Account with That Email'
  </script>";

 }
 else{

    if($_FILES['photo']['name']=="")
    {
        $_FILES['photo']['name']=$_SESSION['photo'];
    }
    $_SESSION['photo']=$_FILES['photo']['name'];
$sql= "UPDATE users set name='".$_POST['name']."' , phone='".$_POST['phone']."', address='".$_POST['address']."',password='".$_POST['password']."', photo='".$_FILES['photo']['name']."' WHERE id='".$_SESSION['id']."' ";
$result= mysqli_query($conn,$sql);
 if($result)

    $_SESSION['name']=$_POST['name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['phone']=$_POST['phone'];
    $_SESSION['address']=$_POST['address'];
     
   
    echo'<a value="Go back to table" style="font-size:50px; float:right;  margin-right:600px; color:red;" href="index.php"><i class="fas fa-door-open"></i></a>';
     echo "<alert style='margin-left:400px; width:400px;' class='form-control alert alert-success justify-content-center'> <i class='far fa-check-circle'></i>Account Edited Succesfuly</alert>";
     $target_dir="images/";
    $target_file=$target_dir.basename($_FILES['photo']['name']);
    $uploadOk=1;
    //$imageFileType= strtolower(pathinfo($target_file),PATHINFO_EXTENSION);
    if(file_exists($target_file))
    {
//echo "sorry file doesnt exist";
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
    //header("Location:index.php");
   }
   
 }
  
}
}


edituser();

?>


</body>



</html>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>