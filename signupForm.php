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
    
</head>
<body>
    <!-- <span class="border border-success"></span> -->
<div class="container border border-success formcontainer text-center">
    <h3><b> Create Your Account</b></h3>
    <form  action="" method="post" class="form-group f" enctype="multipart/form-data" onsubmit="validate()">
        
<input type="text" placeholder="Full Name" name="name" class="form-control" id="name">
<div id="nameerror"></div>
<input type="email" placeholder="Email Address" name="email" class="form-control" id="email">
<div id="emailerror"></div>
<input type="text" placeholder="Phone Number" name="phone" class="form-control" id="phone">
<div id="phoneerror"></div>
<input type="text" placeholder="Address" name="address" class="form-control"id="address">
<div id="addresserror"></div>

<input type="password" placeholder="Password" name="password" class="form-control" id="password"><br>
<div id="passworderror"></div>
<b id="uploadtext">Upload your profile photo:<b><br>
<input type="file" name="photo"  class="ProfilePhoto"><br>
<input type="hidden" value="customer" name="role" >
<input type="submit" value="Sign Up" name="signup" class="btn btn-success signupbtn" class="form-control">
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
    <?php $error=false; ?>
  if(user_name == '' || user_email =='' || user_phone ==''|| user_address ==''|| user_pass ==''){
    <?php $error=true; ?>
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



</script>

<?php
if(isset($_POST['signup'])){
    if($error)
    {
?>
<script> validate();</script>
<?php
    }
    else{
$conn= new mysqli("localhost","root","","eshtrely");
 
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



</html>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>