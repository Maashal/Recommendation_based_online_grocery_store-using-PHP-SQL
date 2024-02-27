<?php 
session_start();
$admin_id=$_SESSION["admin_id"];
$customer_id=$_SESSION["customer_id"];
if((isset($admin_id)) OR (isset($customer_id)))
{
   session_destroy();
   header("location:index.php");
}
else{
    header("location:index.php");
    exit();
}

 ?>
