<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
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
session_start();
if(isset($_POST['logout']))
{
  $_SESSION['name']="";
  $_SESSION['photo']="";
  header('Location:index.php');
  setcookie("shopping_cart", "", time() - 3600);
}

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
    header("Location:index.php");
}

$conn= new mysqli("localhost","root","","eshtrely");
if (!$conn){
  die("connection failed:".mysql_connect_error());
}
if(isset($_POST['send']))
{

    
	$createdAt = date("Y-m-d h:i:sa");
	$sender = $_SESSION['id'];
  $senderName=$_SESSION['name'];
	$receiver = 14;
	$message = $_POST['message'];
	$sendMessage = "INSERT INTO messages(sender,senderName,receiver,message,createdAt) VALUES('$sender','$senderName','$receiver','$message','$createdAt')";
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
}
 
$sql= "SELECT  message,sender,createdAt From messages WHERE sender=14 and receiver ='".$_SESSION['id']."' OR (sender ='".$_SESSION['id']."' AND receiver=14) ORDER BY createdAt asc";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0) {
    $rows=$result->num_rows;
    echo"<table class='table' style='width:500px; margin-left:10px'>";
    for($i=0;$i<$rows;$i++)
    {
        $senderMessages= mysqli_fetch_array($result); 
       
        
            if($senderMessages[1]==$_SESSION['id'])
            {
              echo"<tr class='bg-warning'>";
                echo"<td class='bg-warning'><b>You</b></td>";
                echo"<td >".$senderMessages[0]."</td>";
                echo"<td >".$senderMessages[2]."</td>";
                
            }
            else{
              echo"<tr class='bg-info'>";
              echo"<td class='bg-info'><b>Admin<b></td>";
              echo"<td >".$senderMessages[0]."</td>";
              echo"<td >".$senderMessages[2]."</td>";
              
            }
            
           
        echo"</tr>";
        
    }
    echo"</table>";

}
else{
    echo"<h2>No Messages has been send</h2>";
}


?>



<form   action="" method="post" enctype="multipart/form-data" >
  
  <div class="form-group">
    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="How Can the Admin Help You!!"
    style="width:600px; height:100px; margin-left:10px; background-color:lightgrey;"></textarea>
  </div>

  <div class="form-group">
  <input type="file" style="margin-left:220px"name="photo"  class="ProfilePhoto"><br>
  <input type="submit" style="margin-left:240px" value="Send" name="send" class="btn btn-primary" class="form-control">
</div>

</form>









</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</html>