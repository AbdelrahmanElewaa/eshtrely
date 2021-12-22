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
     <?php
     session_start();
     ?>
</head>
<body>
    <!-- <span class="border border-success"></span> -->
<div class="container border border-success formcontainer text-center">
    <h3><b> Edit your Account</b></h3>

    <form  action="" method="post" class="form-group f" enctype="multipart/form-data">
<input type="text" placeholder="Full Name" name="name" class="form-control" id="firstinput" <?php echo "value='".$_SESSION['name']."'"; ?>>
<input type="email" placeholder="Email Address" name="email" class="form-control" <?php echo "value='".$_SESSION['email']."'"; ?>>
<input type="text" placeholder="Phone Number" name="phone" class="form-control" <?php echo "value='".$_SESSION['phone']."'"; ?>>
<input type="text" placeholder="Address" name="address" class="form-control" <?php echo "value='".$_SESSION['address']."'"; ?>>
<input type="password" placeholder="Password" name="password" class="form-control"<?php echo "value='".$_SESSION['password']."'"; ?>><br>
<b id="uploadtext">Upload your profile photo:<b><br>
<input type="file" name="photo"  class="ProfilePhoto"><br>
 

<?php
if(isset($_POST['editsubmit'])){
   
$conn= new mysqli("localhost","root","","eshtrely");
 
$sql= "UPDATE users set name='".$_POST['name']."' , phone='".$_POST['phone']."', address='".$_POST['address']."',password='".$_POST['password']."', photo='".$_FILES['photo']['name']."' WHERE id='".$_SESSION['id']."' ";
$result= mysqli_query($conn,$sql);
 if($result)
 {
    $_SESSION['name']=$_POST['name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['phone']=$_POST['phone'];
    $_SESSION['address']=$_POST['address'];
     
    if($_FILES['photo']['name']=="")
    {
        $_FILES['photo']['name']= $_SESSION['photo'];
    }
    $_SESSION['photo']=$_FILES['photo']['name'];
    
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
<input type="submit" value="Save Changes" name="editsubmit" class="btn btn-primary signupbtn" class="form-control">
    </form>
</div>
</body>



</html>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>