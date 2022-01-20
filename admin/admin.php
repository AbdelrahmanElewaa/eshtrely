 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  
</head> 
   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="links/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  
  <!-- -------------------------------includes -------------------------------->
 <?php
 
  include('includes/sidebar.php');


 if( $_SESSION['role'] == 'admin'){ //if admin (type == 0)
           //header('Location:admin/admin.php');
       

  include('includes/sourcesCSS.php');
 // the include of the side bar has to be before any include that has an html output so the session can start and put its values
 //include('includes/sidebar.php');
 include('includes/navbar.php');
 
 include('includes/main.php');
 include('includes/sourcesJS.php');
 
    }

    else{ //if not admin (type !== 0)

         
         ?>
          
          <script>window.location.replace("../loginform.php"); </script>
<?php

    }
 ?>










 
</body>
</html>