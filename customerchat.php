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
    header("Location:index.php");
}

$conn= new mysqli("localhost","root","","eshtrely");
$sql= "SELECT  message From messages WHERE sender = 0 AND receiver ='".$_SESSION['id']."' OR sender ='".$_SESSION['id']."' AND receiver =0 ";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0) {
    $rows=$result->num_rows;
  
    for($i=0;$i<$rows;$i++)
    {
        $senderMessages= mysqli_fetch_array($result); 
        for($j=0;$j<1;$j++)
        {
     
            echo"<p>".$senderMessages[$j]."</p>";
            echo"<br>";
        }
        
    }

}
else{
    echo"<h2>No Messages has been send</h2>";
}

if(isset($_POST['send']))
{

    $conn= new mysqli("localhost","root","","eshtrely");
	$createdAt = date("Y-m-d h:i:sa");
	$sender =0;
	$receiver = $_GET['id'];
	$message = $_POST['message'];
	$sendMessage = "INSERT INTO messages(sender,receiver,message,createdAt) VALUES('$sender','$receiver','$message','$createdAt')";
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
}
?>












</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</html>