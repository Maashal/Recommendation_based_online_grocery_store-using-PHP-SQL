<?php
session_start();
include("dbconnection.php");
$admin_id=$_SESSION["admin_id"];
if(isset($admin_id))
{

}
else{
    header("location:index.php");
    exit();
}
    ?>
<?php 
$id=$_GET['id'];
  $run=mysqli_query($con,"SELECT * FROM `purchase_request` WHERE id='$id'");
  $data= mysqli_fetch_assoc($run);
  $p_id=$data['p_id'];
  $customer_id=$data['customer_id'];
  $quantity=$data['quantity'];
  $total_amount=$data['total_amount'];
  $run= mysqli_query($con, "INSERT INTO `approve_purchase_request`(`p_id`, `customer_id`, `quantity`, `total_amount`) VALUES ('$p_id','$customer_id','$quantity','$total_amount')");
  if($run)
  {
      $run1= mysqli_query($con, "DELETE FROM `purchase_request` WHERE id='$id'");
      if($run1)
      {      
         alert("Sucessfully approve Purchase Request!");
         redirect_to("manage_sales.php");
         
      }
     else
     {
        alert("Failed");
     }
  }
  ?>
<?php
function alert($text)
{
    echo"<script>alert(\"$text\");</script>";
}
function redirect_to($path)
{
    echo"<script>location=\"$path\";</script>";
}
?>