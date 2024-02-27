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
  $run=mysqli_query($con,"SELECT * FROM `issue_return_exchange` WHERE id='$id'");
  $data= mysqli_fetch_assoc($run);
  $p_id=$data['payment_id'];
  $customer_id=$data['customer_id'];
  $reason=$data['reason'];
  $run1= mysqli_query($con, "INSERT INTO `solve`(`customer_id`, `payment_id`, `reason`) "
          . "VALUES ('$customer_id','$p_id','$reason')");
  if($run1)
  {
      $run2= mysqli_query($con, "DELETE FROM `issue_return_exchange` WHERE id='$id'");
      if($run2)
      {      
         alert("Sucessfully Solve the Issue!");
         redirect_to("adminwelcome.php");
         
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