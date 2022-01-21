 <?php
  session_start();
 if(isset($_POST['surveySubmit'])){
    
    try{
        if(($conn = new mysqli("localhost", "root", "", "eshtrely"))-> connect_errno){
            throw new customException("<h1 style='color:red;'>Unable to Connect</h1>");
        }
    }
    catch (customException $e) {
        echo $e->errorMessage();
        }

  
     
$sql= "INSERT INTO survey (userID,username,product,website,service,prices) VALUES ('".$_SESSION['id']."','".$_SESSION['name']."','".$_POST['product']."','".$_POST['website']."','".$_POST['service']."','".$_POST['prices']."')";
$result= mysqli_query($conn,$sql);
 
     header("Location:index.php");
 }
  

   



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signform.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
.error
{
    color:red;
}

</style>
</head>
<body>
    <!-- <span class="border border-success"></span> -->
<div class="container border border-danger formcontainer ">
    <h3 class="text-center"><b> Survey</b></h3>
    <form  action="" method="post" class="form-group f" enctype="multipart/form-data" onsubmit="return validate()">
        


    <p class="fw-bold">How satisfied are you with our product?</p>

    <select name="product" class="form-control roleselect" id="role"   >

    <option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>

<p class="fw-bold">How satisfied are you with our Service?</p>

<select name="service" class="form-control roleselect" id="role"  >

<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>

<p class="fw-bold">How satisfied are you with our Website?</p>

<select name="website" class="form-control roleselect" id="role"   >

<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>



<p class="fw-bold">How is our Prices?</p>
<select  class="form-control roleselect" name="prices"  >

<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>

<input type="submit" value="Submit" name="surveySubmit" class="btn btn-primary">

    </form>
</div>
</body>


 
 





</html>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>