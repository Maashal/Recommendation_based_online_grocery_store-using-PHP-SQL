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
  $apr_id=$data['apr_id'];
  $method =$data['method'];
  $s_account =$data['sender_account'];
  $r_account =$data['receiver_account'];
  $run1= mysqli_query($con, "INSERT INTO `reject_payment`(`p_id`, `customer_id`, `apr_id`, `amount`, `date`, `bank`, `s_account`, `r_account`, `method`) "
          . "VALUES ('$p_id','$customer_id','$apr_id','$amount','$date','$bank','$s_account','$r_account','$method')");
  if($run1)
  {
      echo "Qaiser";
      $run2= mysqli_query($con, "DELETE FROM `payment_request` WHERE id='$id'");
      if($run2)
      {      
         alert("Sucessfully Rejected payment Request!");
         redirect_to("manage_payment.php");
         
      }
     else
          {
        alert("Failed");
           }
 
       }
       else {
        alert("Failed"); 
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