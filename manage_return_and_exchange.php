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
?>

<h1 class="text text-capitalize text-center text-primary"style="color:black;" >Manage Return and Exchange Panel</h1>
<form method="post" class="display"style="margin-left: 600px;background-color:lightblue">
    <table align='center'>
        <tr>
            <td>
                Select Payment:
            </td>
            <td>
                <select name="payment_id" style="width:200px;">
                    <?php
		$query= "SELECT * FROM `approve_payment` where customer_id='$customer_id'";
		$result= mysqli_query($con, $query);
		if($result){
			while($row=mysqli_fetch_assoc($result)){
				?>
				<option value="<?php echo $row['id']; ?>"><?php 
                                $p_id=$row['p_id'];
                                $run= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
                                $data1= mysqli_fetch_assoc($run);
                                echo $data1['p_name']." ".$row['amount']." "."/Rs"; ?></option>

				<?php
			}
		}
		?>
            </select>
            </td>
        </tr>
        <tr>
            <td>
                Enter Reason:
            </td>
            <td>
                <textarea rows="4" cols="45" placeholder="Enter Reason" name="reason"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="done" value="Send">
            </td>
        </tr>
    </table>
</form>
<?php
include ("footer.php");
?>
<?php
if(isset($_POST['done']))
{
    $payment_id=$_POST['payment_id'];
     $reason=$_POST['reason'];
    
    $run= mysqli_query($con, "INSERT INTO `issue_return_exchange`(`customer_id`, `payment_id`, `reason`) "
            . "VALUES ('$customer_id','$payment_id','$reason')");
    if($run)
    {
    alert("Successfully Submitt !");
    redirect_to("customer_welcome.php");
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