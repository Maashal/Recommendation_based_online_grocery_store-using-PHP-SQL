<?php
session_start();
include("dbconnection.php");
include("customer_header.php");
$customer_id=$_SESSION["customer_id"];
if(isset($customer_id))
{

}
else{
    header("location:index.php");
    exit();
}
$id=$_GET['id'];
$run= mysqli_query($con, "SELECT * FROM `shopping_cart` WHERE p_id='$id' AND customer_id='$customer_id'");
$row= mysqli_num_rows($run);
if($row>=1)
{
        alert("Already this Product Add to Cart");
        redirect_to("customer_welcome.php");
}
 else
{
$run1= mysqli_query($con, "INSERT INTO `shopping_cart`(`p_id`, `customer_id`) VALUES ('$id','$customer_id')");
if($run1)
{
        alert("Successfully Add to Cart");
        redirect_to("customer_welcome.php");
}
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
    ?>


