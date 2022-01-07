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
 if(isset($_POST["view_info"]))
{
 
$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

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
   'item_image' =>$_POST["hidden_image"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 header("location:productinfo.php?success=1");
}
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>productinfo</title>
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
   <h3>product Details</h3>
   <table class="table table-bordered">
    <tr>
     <th width="40%">Image</th>
     <th width="40%">Item Name</th>
     <th width="20%">Price</th>

    <!-- </tr>
     <?php
   // if(isset($_COOKIE["shopping_cart"]))
   // {
   //  $total = 0;
   //  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
   // $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
   ?>
    <tr> -->
     <td><?php echo $values["item_image"]; ?></td>
     <td><?php echo $values["item_name"]; ?></td>
     
     <td>$ <?php echo $values["item_price"]; ?></td>
    

    </tr>
<?php  
//}
}
?>
  </body>
  </html>