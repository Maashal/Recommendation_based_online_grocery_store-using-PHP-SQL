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
$id=$_GET['id'];
$query="DELETE FROM `offers` WHERE o_id='$id'";
$run=mysqli_query($con,$query);
if($run)
{
alert("Successfully Delete the Product offer");
redirect_to("manage_offers.php");
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

