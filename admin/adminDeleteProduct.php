<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  
</head> 
   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="links/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  
  <!-- -------------------------------includes -------------------------------->
 <?php
 include('includes/sourcesCSS.php');
 // the include of the side bar has to be before any include that has an html output so the session can start and put its values
 include('includes/sidebar.php');
 include('includes/navbar.php');
 

 include('includes/main.php');
 ?>
 <?php
 $conn= new mysqli("localhost","root","","eshtrely");
 $sql="DELETE FROM products WHERE productid='".$_GET['productid']."'";
 $result= mysqli_query($conn,$sql);
  
     header('Location:admin/products.php');
 
 include('includes/sourcesJS.php');
 ?>
 
</body>
</html>
