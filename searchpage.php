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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
    $conn= new mysqli("localhost","root","","eshtrely");

  $sql="SELECT productimage,productname,productid,productprice, rating,quantity FROM products ";
  $result=mysqli_query($conn,$sql);
  $message = '';


if(isset($_POST["add_to_cart"]))
{
// if (!empty($_SESSION['name']))
// {

 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
   }

  }
 }
 else
 {
  $item_array = array(
   'item_id'   => $_POST["hidden_id"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 
 if (!empty($_SESSION['name']))
 {
// echo "<scrip>window.location.href='index.php'</script>";
  header("location:index.php?success=1");
 }
else{
 header("location:signupForm.php");
 }
}
if(isset($_GET["success"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
  echo $message; 
  }  

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
        <a href="cart2.php"> Your Cart </a>
    <div class="search-container">
    <form method='get' action='searchpage.php'>
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
    </div>
<?php
if(isset($_GET['search'])){
$searchKey=$_GET['search'];
$conn= new mysqli("localhost","root","","eshtrely");
$sql="SELECT productimage,productname,productid,productprice, rating FROM products WHERE productname LIKE '%$searchKey%'";
$result=mysqli_query($conn,$sql) or die($conn->error);
$rows=$result->num_rows;
 
if(empty($rows)){
        echo "<h1>No results found</h1>";
    }

 else{
  foreach($result as $row)
   {

echo '<div >
    <div >
    <div >'; 
    
    ?>
         <div class="col-md-3">
    <form method="post">
     <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
      <img src="images/products/<?php echo $row["productimage"]; ?>" class="img-responsive" /><br />

      <h4 class="text-info"><?php echo $row["productname"]; ?></h4>

      <h4 class="text-danger">$ <?php echo $row["productprice"]; ?></h4>

      <input type="text" name="quantity" value="1" class="form-control" />
      <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />
      <input type="hidden" name="hidden_price" value="<?php echo $row["productprice"]; ?>" />
      <input type="hidden" name="hidden_id" value="<?php echo $row["productid"]; ?>" />
      <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
     </div>
    </form>
   </div>
   <?php
   }
 }
   // for($i=0;$i<$rows;$i++)
// {
//     $row= $result->fetch_array(MYSQLI_NUM);
      
//     for($j=0;$j<5;$j++){
//             if ($j==0) {
//                 echo "<img src= images/products/".$row[0]." width='100' height='100'><br>";

//             }
//             else{
//                 echo $row[$j]."<br>";
//             }


  
//         }


//  echo "</div>"; 

 
// }
echo "
      </div>";   
      }      

   ?>





</div>
    
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/validation.js"></script>
</html>
