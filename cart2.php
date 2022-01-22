<?php 

include('mainIncludes/mainNavbar.php');
session_start();
$message = '';
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
                if(isset($_GET["action"]))
{
                if($_GET["action"] == "Checkout")
 {
  // setcookie("shopping_cart", "", time() - 3600);
  header("location:cart2.php?Checkout=1");
  $conn= new mysqli("localhost","root","","eshtrely");
  if (!$conn){
  die("connection failed:".mysql_connect_error());
}
  $cookie_data = stripslashes($_COOKIE['shopping_cart']); //to decode data before using it 
  $cart_data = json_decode($cookie_data, true);

  foreach($cart_data as $keys => $values)
    {
      
      $sql="update products set quantity= quantity - '". $values["item_quantity"]."' where productid=  '".$values[ "item_id" ]."'  ";
      $result=mysqli_query($conn,$sql); 
     
     $sql2="INSERT INTO orders (`userid`,`productid`,`quantity`) VALUES ('".$_SESSION["id"]."','".$values[ "item_id" ]."','".$values["item_quantity"]."') ";
     $result2=mysqli_query($conn,$sql2)or die($conn->error); 
    
      

    }
    
      
 

 
 


 setcookie("shopping_cart", "", time() - 3600);
 
 }
 if(isset($_GET["Checkout"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Checkout succeeded
 </div>
 ';

  
  }   

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

}   /// close curly bracket of the else above
if(isset($_POST['logout']))
{
  $_SESSION['name']="";
  $_SESSION['photo']="";
  header('Location:index.php');
  setcookie("shopping_cart", "", time() - 3600);
}

$connect = new PDO("mysql:host=localhost;dbname=eshtrely", "root", "");



if(isset($_POST["add_to_cart"]))
{
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
 header("location:cart2.php?success=1");
}

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:cart2.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:cart2.php?clearall=1");
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
}

if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your Shopping Cart has been clear...
 </div>
 ';
}




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/search.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>


 <body>
 </nav>
  <br />
  <div class="container">
   <br />
  
   <br /><br />
  
   
   
   <div style="clear:both"></div>
   <br />
   <h3>Order Details</h3>
   <div class="table-responsive">
   <?php 
  
   ?>
   <div align="right">
    <a href="cart2.php?action=clear"><b>Clear Cart</b></a>
   </div>
   <table class="table table-bordered">
    <tr>
     <th width="40%">Item Name</th>
     <th width="10%">Quantity</th>
     <th width="20%">Price</th>
     <th width="15%">Total</th>
     <th width="5%">Action</th>
    </tr>
   <?php
   if(isset($_COOKIE["shopping_cart"]))
   {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
   ?>
    <tr>
     <td><?php echo $values["item_name"]; ?></td>
     <td><?php echo $values["item_quantity"]; ?></td>
     <td>$ <?php echo $values["item_price"]; ?></td>
     <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
     <td><a href="cart2.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>

    </tr>

   <?php 
     $total = $total + ($values["item_quantity"] * $values["item_price"]);

    }
     
  
   echo $message; 
  

   ?>
    <tr>
     <td colspan="3" align="right">Total</td>
     <td align="right">$ <?php echo number_format($total, 2); ?></td>
     <td></td>
    </tr>

   <?php
   }
   else
   {
    echo '
    <tr>
     <td colspan="5" align="center">No Item in Cart</td>
    </tr>
    ';
   }
   ?>
   </table>
   <input onclick="document.location='cart2.php?action=Checkout'" type="submit" name="Checkout" style="margin-top:5px;" class="btn btn-success" value="Checkout" />

   </div>
  </div>
  <br />
 </body>
 <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/validation.js"></script>
</html>
