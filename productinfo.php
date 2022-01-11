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

    $time=date("l jS \of F Y h:i:s A");
    $review= $_POST['user_review'];
    $conn= new mysqli("localhost","root","","eshtrely");
    $sql= "INSERT INTO  `reviews` ( `userid`,`username`,`userimage`, `productid`, `reviewdate`, `review`) VALUES ('".$_SESSION['id']."','".$_SESSION['name']."','".$_SESSION['photo']."','".$_GET['id']."','".$time."', '".$review."'  )";
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
if(isset($_POST['logout']))
{
  $_SESSION['name']="";
  $_SESSION['photo']="";
  header('Location:index.php');
  setcookie("shopping_cart", "", time() - 3600);
}
function displayReview(){
  $id = $_GET['id'];
    $conn= new mysqli("localhost","root","","eshtrely");
  $sql="SELECT userimage,username,review,reviewdate FROM reviews where productid = '".$id."' ";
  $result=mysqli_query($conn,$sql);
  echo "<div class='review'>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<img class='comment' src= 'images/".$row[0]."'> ".$row[1];
    echo "<p class='solid' style='padding-top:10px;'>".$row[2]."</p>";
    echo "<h6 class='time'>".$row[3]."</h6>";
    echo"<br><br>";
    echo "</div>";

}
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
    <link rel="stylesheet" href="css/productinfo.css">
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
              <input name="user_review" class="form-control" placeholder="Type Review Here" style="height: 50px;" type="text" />
            </div>
            <div class="form-group text-center mt-4">
              <input type="submit" class="btn btn-primary" name="save_review" value="Submit" />
     
            </div>

<!-- habd -->
<div class="modal-body">
            <h4 class="text-center mt-2 mb-4">
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
            </h4>
            <div class="form-group text-center mt-4">
              <button type="button" class="btn btn-primary" id="save_review">Submit Rating</button>
            </div>
            </div>
<b><span id="average_rating">0.0</span> / 5</b>
              </h1>
              <div class="mb-3">
                <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
              </div>
              
            </div>
      <div class="col-sm-4">
              <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
              <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
              <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
              <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
              <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
            </div>
<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
  color:#e9ecef;
}
</style>



<!-- habd -->
          </form> 

          </div>
            <h3></span> Reviews</h3>
        </div>
        <?php displayReview();  ?>
  </body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/validation.js"></script>

  </html>
