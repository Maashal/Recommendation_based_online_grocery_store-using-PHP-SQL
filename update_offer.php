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
$id=$_GET['id'];
$run11= mysqli_query($con, "SELECT * FROM `offers` where o_id='$id'");
$data= mysqli_fetch_assoc($run11);
if(isset($_POST['done']))
{
    if(empty($_POST['p_id']))
    {
        $p_id=$data['p_id'];
    }
    else
    {
$p_id=$_POST['p_id'];
    }
if(empty($_POST['detail']))
{
    $detail=$data['o_detail'];
}
 else {
    $detail=$_POST['detail'];
}

$run=mysqli_query($con,"UPDATE `offers` SET `p_id`='$p_id',`o_detail`='$detail' WHERE o_id='$id'");
if($run)
{
alert("Successfully Update Product Offer!");
redirect_to("manage_offers.php");
}
else
{
alert("Failed");
}
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

<a style="float:right;margin-top:40px;margin-right:20px;text-decoration:none;" class="btn btn-danger" href="logout.php"><b>Logout</b></a>
<h1 class="text text-capitalize text-center text-primary">Update Product Panel</h1>
<div style="width: 850px ;height: 300px;background-color: whitesmoke;border: 1px solid burlywood;margin-left: 400px;padding-right: 200px " align="center">
<form method="post" enctype="multipart/form-data">
    <table >
        <tr>
            <td>
                Select Product:
            </td>
            <td>
            <select name="p_id">
                    <?php
		$query= "SELECT * FROM `product`";
		$result= mysqli_query($con, $query);
		if($result){
			while($row=mysqli_fetch_assoc($result)){
				?>
				<option value="<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></option>

				<?php
			}
		}
		?>
            </select></td>
        </tr>
         <tr>
            <td>
                Offer Detail:
            </td>
            <td>
                <textarea rows="3" cols="45" name="detail"   ></textarea>
            </td>
        </tr>
         <tr>
            <td>
                <input type="reset" value="Clear" class="btn btn-danger">
            </td>
            <td>
                <input type="submit" name="done"  value="Update Offer" class="btn btn-success">
            </td>
        </tr>
    </table>
</form>
</div>