<?php

include('session.php');
 
// $_SESSION['id']="";
// $_SESSION['name']="";
// $_SESSION['email']='';
// $_SESSION['password']='';
// $_SESSION['phone']='';
// $_SESSION['address']='';
// $_SESSION['role']='';
// $_SESSION['photo']="";
$_SESSION['name']="";
$_SESSION['photo']="";
header('Location:../index.php');
setcookie("shopping_cart", "", time() - 3600);
 
   


?>