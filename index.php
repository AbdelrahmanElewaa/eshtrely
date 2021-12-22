<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>

        <?php
include('mainIncludes/mainNavbar.php');
session_start();
if (!empty($_SESSION['name']))
{
  echo '<div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right:20px;">
  <img class="rounded border-success" style="border-radius:50%;margin-right:20px; width:50px; height:50px; background-size: cover; object-fit: cover;"src="images/'.$_SESSION['photo'].'"><b style="margin-right:30px">' .$_SESSION['name'].'</b>            
                </a>
                <div style="width:70px;"class="dropdown-menu" aria-labelledby="profile">

                <form action="edituser.php" method="post">
                <button type="submit" name="edit" class="dropdown-item" ><i class="fas fa-edit"></i>Edit Profile</button>
                </form>
<form action="" method="post">
                 
                  <button type="submit" name="logout" class="dropdown-item" ><i class="fas fa-sign-out-alt"></i>Log Out</button> 
      </form>             

                <?php
                </div>
                </div></nav>';
    

}
else{
// the continue of else curly bracket  down in the next open of the php <?php ... but the body of else is under us and written in only html 
        ?>


        <a  href="signupForm.php"class="btn btn-success signUp">Sign Up</a>

        <!-- ------------------------login form-------------------------------------- -->
        <a href="loginform.php"><input type="submit" id="myInput"class="btn btn-primary login"  value="Login"></a>
      </nav>


     


      <!------------------------------------- End of login form ------------------->


      <?php

}   /// close curly bracket of the else above


// logout operations
 
if(isset($_POST['logout']))
{
  $_SESSION['name']="";
  $_SESSION['photo']="";
  header('Location:index.php');
}

?>
   
      <script>
// $('#myModal').on('shown.bs.modal', function () {
//   $('#myInput').trigger('focus')
// })    
$('#myModal').modal({
    backdrop: 'static',
    keyboard: false
})
    </script>
   
   <?php



$cartarray= array();

$conn= new mysqli("localhost","root","","eshtrely");
$sql="SELECT productimage,productname,productid,productprice, rating FROM products ";
$result=mysqli_query($conn,$sql);
$rows=$result->num_rows;
for($i=0;$i<$rows;$i++)
{
    $row= $result->fetch_array(MYSQLI_NUM);
    
    for($j=0;$j<5;$j++)
          {
            if ($j==0) {
                echo "<img src= images/products/".$row[0]." width='200' height='200'>";

            }
            else{
                echo $row[$j];
            }


  echo "<br>";
    
        
           }


 echo   "<button name=\"addtocart.$i\"type=\"addtocart\">Add to Cart</button>";

 echo "<br>";  
 echo "<br>";              


}
   ?>
   

</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/validation.js"></script>
</html>