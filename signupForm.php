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
input[type=button]{
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 12px 27px;
  text-decoration: none;
  margin: 3px 1px;
  cursor: pointer;
}
</style>
    
</head>

<body>
    <!-- <span class="border border-success"></span> -->
<div class="container border border-success formcontainer text-center">
    <h3><b> Create Your Account</b></h3>
    <form  action="" method="post" class="form-group f" enctype="multipart/form-data">
        
<input type="text" placeholder="Full Name" name="name" class="form-control" id="firstinput">
<input type="email" placeholder="Email Address" name="email" class="form-control">
<input type="text" placeholder="Phone Number" name="phone" class="form-control">
<input type="text" placeholder="Address" name="address" class="form-control">
<input type="password" placeholder="Password" name="password" class="form-control"><br>
<b id="uploadtext">Upload your profile photo:<b><br>
<input type="file" name="photo"  class="ProfilePhoto"><br>
<input type="hidden" value="customer" name="role" >

<?php
if(isset($_POST['signup'])){
$conn= new mysqli("localhost","root","","eshtrely");
if (!$conn){
	die("connection failed:".mysql_connect_error());
}
 
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
}

?>
<input type="submit" value="Sign Up" name="signup" class="btn btn-success signupbtn" class="form-control">
<br>
 <input  type="button" onclick="window.location.href='loginform.php'" value="already have an account?" />
    </form>

</div>
</body>



</html>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>