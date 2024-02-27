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
$p_id=$_GET['id'];
$run= mysqli_query($con,"SELECT * FROM `product` where p_id='$p_id'");
$data= mysqli_fetch_assoc($run);
    ?>

<a style="float:right;margin-top:40px;margin-right:20px;text-decoration:none;" class="btn btn-danger" href="logout.php"><b>Logout</b></a>
<h1 class="text text-capitalize text-center text-primary"style="color: Black">Buy Product Panel</h1>
<form method="post">
    <table align="center">
        <tr>
            <td>
                Select Quantity:
            </td>
            <td>
                <input type="number" name="quantity" required="">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="done" value="Purchase" >
            </td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST['done']))
{
    $quantity=$_POST['quantity'];
    $total_amount=$quantity*$data['p_price'];
    $run1= mysqli_query($con, "INSERT INTO `purchase_request`(`p_id`, `customer_id`, `quantity`, `total_amount`) VALUES ('$p_id','$customer_id','$quantity','$total_amount')");
    if($run1)
    {
        alert("Purchase Request Submitted Successfully!");
        $result= mysqli_query($con, "DELETE FROM `shopping_cart` WHERE p_id='$p_id'");
        redirect_to("customer_welcome.php");
    }
 else {
        alert("Failed!");    
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