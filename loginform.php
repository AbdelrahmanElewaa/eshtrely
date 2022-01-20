
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
     
     <script src="js/validation.js"></script>
     <?php
     session_start();
     ?>
<style>

.e{
color:red;
}
</style>
 </head>
 <body>

 <div class="container border">
   <h3 class="text-center">Login</h3>
                <form class="form-group" action="#" method="post" onsubmit="return validate()">
              Email <b style="color:red;">*</b>
              <input class="form-control" type="text" autocomplete="off" placeholder="Email" name="email" id="emailID"><br>
             <div id="emailerror" class="e">

             </div>
             <div id="emailerror2" class="e">

             </div>
              Password <b style="color:red;">*</b>
              <input class="form-control" type="password" autocomplete="off" placeholder="Password" name="password" id="passwordID">
              <div id="passworderror" class="e"> 

              </div>
     
              <div id="userDoesntExist" class="e"></div>
              <input type="submit" id="loginm" name="loginsubmit" class="btn btn-primary loginmodal" value="Log in">
              
            </form>
            </div>
<script>
 
function validate()
{
    var user_email = document.getElementById('emailID').value ;
    var user_pass = document.getElementById('passwordID').value;

  if(user_email == '' || user_pass ==''){
       
      if(user_email == ''){
            document.getElementById('emailerror').innerHTML = 'Email is Required';
            
        } 
        else{
          document.getElementById('emailerror').innerHTML='';
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
 
if(isset($_POST['loginsubmit']))
{
$email=$_POST['email'];
$password=$_POST['password'];

  $sanitizedEmail=filter_var($email,FILTER_SANITIZE_EMAIL);
  $sanitizedPass=filter_var($password,FILTER_SANITIZE_STRING);

if(filter_var($sanitizedEmail,FILTER_VALIDATE_EMAIL))
{
  echo" <script>
  document.getElementById('emailerror2').innerHTML='';
  </script>";
$conn= new mysqli("localhost","root","","eshtrely");
if (!$conn){
  die("connection failed:".mysql_connect_error());
}
$sql="SELECT * FROM users WHERE email='".$_POST['email']."' and password='".$_POST['password']."'";
$result= mysqli_query($conn,$sql);
if($row= mysqli_fetch_array($result))
{
$_SESSION['id']=$row[0];
$_SESSION['name']=$row[1];
$_SESSION['email']=$row[2];
$_SESSION['password']=$row[3];
$_SESSION['phone']=$row[4];
$_SESSION['address']=$row[5];
$_SESSION['role']=$row[6];
$_SESSION['photo']=$row[7];

if($row[6]=="admin")
{
  header("Location:admin/admin.php");
}
else if($row[6]=="HR"){
  header("Location:HR/HR.php");
}
else if($row[6]=="auditor"){
  header("Location:auditor/auditor.php");
}

else
{
header("Location:index.php");
}

}
else{
echo"<script> document.getElementById('userDoesntExist').innerHTML='User Doesnt Exist... Try Again'</script>";
}

}
else{
  echo" <script>
  document.getElementById('emailerror2').innerHTML='Enter your Email correctly';
  </script>";
}

}

?>
<!-- <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script> -->

 </body>
 </html>













 