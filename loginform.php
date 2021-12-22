
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/all.min.css">
     <link rel="stylesheet" href="css/loginform.css">
     <?php
     session_start();
     ?>
 </head>
 <body>

 <div class="container border">
   <h3 class="text-center">Login</h3>
                <form class="form-group" action="#" method="post" onsubmit="return validateform()">
              Email <input class="form-control" type="email" autocomplete="off" placeholder="Email" name="email" id="emailID"><br>
             <div id="emailerror">

             </div>
              Password<input class="form-control" type="password" placeholder="Password" name="password" id="passwordID">
              <div id="passworderror"> </div>
              <input type="submit" id="loginm" name="loginsubmit" class="btn btn-primary loginmodal" value="Log in">
              
            </form>
            </div>

            <?php
 
if(isset($_POST['loginsubmit']))
{
$conn= new mysqli("localhost","root","","eshtrely");
$sql="SELECT * FROM users WHERE email='".$_POST['email']."' and password='".$_POST['password']."'";
$result= mysqli_query($conn,$sql);
if($result)
{
$row= mysqli_fetch_array($result);
$_SESSION['id']=$row[0];
$_SESSION['name']=$row[1];
$_SESSION['email']=$row[2];
$_SESSION['password']=$row[3];
$_SESSION['phone']=$row[4];
$_SESSION['address']=$row[5];
$_SESSION['role']=$row[6];
$_SESSION['photo']=$row[7];
if($row["role"]=="admin")
{
  header("Location:admin/admin.php");
}
else{
  header("Location:index.php");
}
}
else{
echo"error";
}

}
?>

<script src="js/validation.js"></script>
 </body>
 </html>













 