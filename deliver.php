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
  $run1= mysqli_query($con, "INSERT INTO `delivery`(`apr_id`) VALUES ('$id')");
  if($run1)
  {
      
           
         alert("Sucessfully deliver To Customer!");
         redirect_to("manage_shipment.php");
         
  }
     else
     {
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