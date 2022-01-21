<?php
include('session.php');
if(isset($_POST['logout']))
{
  $_SESSION['name']="";
  $_SESSION['photo']="";
  header('Location:../index.php');
  
}
?>
<!-- Main Sidebar Container -->
  
<aside style="position:fixed;"class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="auditor.php" class="brand-link">
      <img src="links/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Auditor Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          echo '<img src="../images/'.$_SESSION['photo'].'" class="img-circle elevation-2" alt="User Image">';
        ?>
          </div>
        <div class="info">
           
        <?php
        
          echo "<a href='#' class='d-block'>".$_SESSION['name']."</a>"
         ?>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="auditor.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
          
              <li class="nav-item">
                <a href="HRrequest.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request HR</p>
                </a>
              </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admins.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="userSurvey.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surveys</p>
                </a>
              </li>
            
             
        </ul>
        <li class="nav-item">
                <form action="" method="post">
                <button type="submit" name="logout" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </button>
                </form>
              </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
