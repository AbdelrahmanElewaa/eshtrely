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
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
<?php 
include('mainIncludes/mainNavbar.php');
include('admin/includes/session.php');
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

}   /// close curly bra
?>
</nav>
<!--Search Bar-->

    <div class="topnav">
    <div class="search-container">
    <form method='get' action='searchpage.php'>
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
    </div>
<?php
$searchKey=$_GET['search'];
$conn= new mysqli("localhost","root","","eshtrely");
$sql="SELECT productimage,productname,productid,productprice, rating FROM products WHERE productname LIKE '%$searchKey%'";
$result=mysqli_query($conn,$sql) or die($conn->error);
$rows=$result->num_rows;
echo '<div >
    <div >
    <div >'; 
    if(empty($rows)){
    	echo "<h1>No results found</h1>";
    }
    else{
for($i=0;$i<$rows;$i++)
{
    $row= $result->fetch_array(MYSQLI_NUM);
      
    for($j=0;$j<5;$j++){
            if ($j==0) {
                echo "<img src= ".$row[0]." width='100' height='100'><br>";

            }
            else{
                echo $row[$j]."<br>";
            }


  
        }


 echo "</div>"; 

 
}
echo "
      </div>"; 
      }      




?>
</div>
	
</body>
</html>