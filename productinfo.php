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


  if (isset($_POST['save_review'])) {
    $review= $_POST['user_review'];
    $conn= new mysqli("localhost","root","","eshtrely");
    $sql= "INSERT INTO  `reviews` ( `userid`, `productid`, `review`) VALUES ('".$_SESSION['id']."','".$_GET['id']."', '".$review."'  )";
    if ($conn->query($sql)) {
       echo "dehk";
    }
    else{
      echo  $sql."<br>".$conn->error;
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

}   
/// close curly bracket of the else above
  

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
   <h3>Product Details</h3>
   <table class="table table-bordered">
    <tr>
     <th width="40%">Image</th>
     <th width="40%">Item Name</th>
     <th width="20%">Price</th>

    </tr>
     <?php
  $id = $_GET['id'];
    $conn= new mysqli("localhost","root","","eshtrely");
  $sql="SELECT productimage,productname,productprice FROM products where productid = '".$id."' ";
  $result=mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($result)) {
    
    ?>
    <tr> 

     <td>  <img src="images/products/<?php echo $row["productimage"]; ?>" class="img-responsive" /> </td>
     <td><?php echo $row['productname']; ?></td>
     <td>$ <?php echo $row['productprice'];?></td>
        </tr>
            



<?php  
}

?>
</table>
<div>
  <form method="post">
<div class="form-group">
 <h4> Write review here</h4>
              <input name="user_review" class="form-control" placeholder="Type Review Here" type="text" />
            </div>
            <div class="form-group text-center mt-4">
              <input type="submit" class="btn btn-primary" name="save_review" value="Submit" />
     
            </div>
<!-- habd -->
<b><span id="average_rating">0.0</span> / 5</b>
              </h1>
              <div class="mb-3">
                <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
              </div>
              <h3><span id="total_review">0</span> Review</h3>
            </div>
<!-- habd -->
          </form> 
          </div>
        </div>
  </body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/validation.js"></script>
  </html>