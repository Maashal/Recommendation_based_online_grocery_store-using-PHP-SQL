<?php
session_start();
include("dbconnection.php");
include("admin_header.php");
$admin_id=$_SESSION["admin_id"];
if(isset($admin_id))
{

}
else{
    header("location:index.php");
    exit();
}
    ?>

<h1 class="text text-capitalize text-center text-primary" style="color: Black">Gifts Management Panel</h1>
<form method="post" class="display" style="background-color:lightblue;">
    <table align="center" style="margin-left: -47px">
        <tr>
            <td>
                <p style="">  Select Customer:</p>
            </td>
            <td>
                <select name="customer_id">
                    <?php
		$query= "SELECT * FROM `customer`";
		$result= mysqli_query($con, $query);
		if($result){
			while($row=mysqli_fetch_assoc($result)){
				?>
				<option value="<?php echo $row['customer_id']; ?>"><?php echo $row['name']; ?></option>

				<?php
			}
		}
		?>
            </select>
            </td>
        </tr>
        <tr>
            <td>
                <p style=""> Select Luck Draw Date:</p>
            </td>
            <td>
                <input type="date" name="date" required="">
            </td>
        </tr>
        <tr>
            <td>
                <p style="">  Enter Gift Detail:</p>
            </td>
            <td>
                <input type="text" name="detail" required="">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="done" value="Add Gift Detail">
            </td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST['done']))
{
    $customer_id=$_POST['customer_id'];
     $detail=$_POST['detail'];
     $date=$_POST['date'];
    $run= mysqli_query($con, "INSERT INTO `gift_detail`(`customer_id`, `ld_date`, `detail`) "
            . "VALUES ('$customer_id','$date','$detail')");
    if($run)
    {
    alert("Successfully Gift Detail Add!");
    redirect_to("manage_gifts.php");
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