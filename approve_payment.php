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
  $run=mysqli_query($con,"SELECT * FROM `payment_request` WHERE id='$id'");
  $data= mysqli_fetch_assoc($run);
  $p_id=$data['p_id'];
  $customer_id=$data['customer_id'];
  $amount=$data['amount'];
  $bank =$data['bank'];
  $date =$data['date'];
  $method =$data['method'];
  $apr_id=$data['apr_id'];
  $s_account =$data['sender_account'];
  $r_account =$data['receiver_account'];
  $run1= mysqli_query($con, "INSERT INTO `approve_payment`(`p_id`, `customer_id`, `apr_id`, `amount`, `bank`, `s_account`, `r_account`, `date`, `method`) "
          . "VALUES ('$p_id','$customer_id','$apr_id','$amount','$bank','$s_account','$r_account','$date','$method')");
  if($run1)
  {
      $run2= mysqli_query($con, "DELETE FROM `payment_request` WHERE id='$id'");
      if($run2)
      {      
         alert("Sucessfully approve payment Request!");
         redirect_to("manage_payment.php");
         
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