<?php
session_start();
include("dbconnection.php");
$customer_id=$_SESSION["customer_id"];
if(isset($customer_id))
{

}
else{
    header("location:index.php");
    exit();
}
   $id=$_GET['id'];
$query="DELETE FROM `shopping_cart` WHERE id='$id'";
$run=mysqli_query($con,$query);
if($run)
{
alert("Successfully Delete the Product From Cart");
redirect_to("view_cart.php");
}
?>
<?php
//to get js alert
function alert($text){
    echo "<script>alert(\"$text\");</script>";
}
//to go to locaton
function redirect_to($path){
    echo "<script>location=\"$path\";</script>";
}
    ?>