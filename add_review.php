<?php
session_start();
error_reporting(0);
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
echo $product_id=$_GET['id'];

    ?>
<h1 class="text text-capitalize text-center text-primary">Customer Add Review Panel</h1>
<form method="post">
    <table align="center">
        <tr>
            <td><p style="color: black">Enter Review:</p></td>
            <td><input type="text" name="review" required="" autofocus=""></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="done" value="Add Review" >
            </td>
        </tr>
    </table>
</form>
<?php
    include ("footer.php");
    if(isset($_POST['done']))
    {
        $review=$_POST['review'];
         $run= mysqli_query($con, "INSERT INTO `review`(`product_id`, `customer_id`, `review_detail`) VALUES ('$product_id','$customer_id','$review')");
         if($run)
            {
            alert("Successfully Customer Review Add!");
            redirect_to("review.php");
            }
            else
            {
                 alert("Failed");
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