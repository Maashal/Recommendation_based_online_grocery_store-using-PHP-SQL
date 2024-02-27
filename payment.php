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
$run= mysqli_query($con, "SELECT * FROM `approve_purchase_request` where id='$id'");
$data= mysqli_fetch_assoc($run);
$p_id=$data['p_id'];
$run1= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
$data1= mysqli_fetch_assoc($run1);
    ?>

<a style="float:right;margin-top:20px;margin-right:20px;text-decoration:none;" class="btn btn-danger" href="logout.php"><b>Logout</b></a>
<h1 class="text text-capitalize text-center text-primary"style="color:black;">Payment Panel</h1>
<form method="post">
    <table align="center" >
        <tr>
            <td>
                Product Name:
            </td>
            <td>
                <input type="text" name="pname" value="<?php echo $data1['p_name']; ?>" autofocus="">
            </td>
        </tr>
        <tr>
            <td>
                Select Transfer Method:
            </td>
            <td>
                <select name="method">
                    <option value="Online Transfer">Online Transfer</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Select Bank:
            </td>
            <td>
                <select name="bank">
                    <option value="HBL">HBL</option>
                    <option value="MCB">MCB</option>
                    <option value="NBP">NBP</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Amount:
            </td>
            <td>
                <input type="text" name="amount" value="<?php echo $amount=$data['total_amount']-($data['total_amount']*5/100);  ?>">
            </td>
        </tr>
        <tr>
            <td>
                Sender Account:
            </td>
            <td>
                <input type="text" name="s_account" required="" placeholder="Enter Your Account Number">
            </td>
        </tr>
        <tr>
            <td>
                Receiver Account:
            </td>
            <td>
                <input type="text" name="r_account" required="" placeholder="Enter Your Account Number">
            </td>
        </tr>
        <tr>
            <td>
                Date:
            </td>
            <td>
                <input type="date" name="date" required="" >
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="done" value="Pay Bill">
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
    $s_account=$_POST['s_account'];
    $r_account=$_POST['r_account'];
    $method=$_POST['method'];
     $date=$_POST['date'];
     $bank=$_POST['bank'];
    $run= mysqli_query($con, "INSERT INTO `payment_request`(`p_id`, `customer_id`, `apr_id`, `bank`, `sender_account`, `receiver_account`, `amount`, `date`, `method`) "
            . "VALUES ('$p_id','$customer_id','$id','$bank','$s_account','$r_account','$amount','$date','$method')");
    if($run)
    {
    alert("Successfully Payment Done!");
	$result= mysqli_query($con, "DELETE FROM `approve_purchase_request` WHERE p_id='$p_id'");
	
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