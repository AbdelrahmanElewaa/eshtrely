<?php
if(isset($_POST['signup'])){
    
    try{
        if(($conn = new mysqli("localhost", "root", "", "eshtrely"))-> connect_errno){
            throw new customException("<h1 style='color:red;'>Unable to Connect</h1>");
        }
    }
    catch (customException $e) {
        echo $e->errorMessage();
        }

 $checkemail="SELECT * FROM users WHERE email='".$_POST['email']."' ";
 $resultcheck= mysqli_query($conn,$checkemail);
 if($row=mysqli_fetch_array($resultcheck))
 {
  
  echo "<script> document.getElementById('emailexists').innerHTML='There is Account with That Email'
  </script>";
 }
 else{
     
$sql= "INSERT INTO users (name,email,phone,address,password,role,photo) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['password']."','".$_POST['role']."','".$_FILES['photo']['name']."')";
$result= mysqli_query($conn,$sql);
 if($result)
 {
     echo "<alert style='margin-top:20px;' class='form-control alert alert-success justify-content-center'> <i class='far fa-check-circle'></i>Account Created Succesfuly</alert>";
     $target_dir="images/";
	$target_file=$target_dir.basename($_FILES['photo']['name']);
	$uploadOk=1;
	//$imageFileType= strtolower(pathinfo($target_file),PATHINFO_EXTENSION);
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
     header("Location:index.php");
 }
 else
 {
     echo "error";
 }
}
   
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signform.css">
    <link rel="stylesheet" href="css/all.min.css">
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
    <h3 class="text-center"><b> Create Your Account</b></h3>
    <form  action="" method="post" class="form-group f" enctype="multipart/form-data" onsubmit="return validate()">
        
<input type="text" placeholder="Full Name" name="name" class="form-control" id="name">
<div id="nameerror" class="error"></div>
<input type="email" placeholder="Email Address" name="email" class="form-control" id="email">
<div id="emailerror"class="error"></div>
<input type="text" placeholder="Phone Number" name="phone" class="form-control" id="phone">
<div id="phoneerror"class="error"></div>
<input type="text" placeholder="Address" name="address" class="form-control"id="address">
<div id="addresserror"class="error"></div>

<input type="password" placeholder="Password" name="password" class="form-control" id="password">
<div id="passworderror"class="error"></div>
<div id="emailexists"class="error"></div><br>
<b id="uploadtext" style="margin-left:220px">Upload your profile photo:<b><br>
<input type="file" style="margin-left:220px"name="photo"  class="ProfilePhoto" id="photo"  onchange="return fileValidation()"><br>
<input type="hidden" value="customer" name="role" >
<input type="submit" style="margin-left:300px" value="Sign Up" name="signup" class="btn btn-success signupbtn" class="form-control">
    </form>
</div>
</body>


<script>
function validate()
{
    var user_name=document.getElementById('name').value;
    var user_email = document.getElementById('email').value ;
    var user_phone=document.getElementById('phone').value;
    var user_address=document.getElementById('address').value;
    var user_pass = document.getElementById('password').value;
   
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





</html>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>