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

<a style="float:right;margin-top:40px;margin-right:20px;text-decoration:none;" class="btn btn-danger" href="logout.php"><b>Logout</b></a>
<h1 class="text text-capitalize text-center text-primary"style="color: Black">Add Offers Panel</h1>
<div style="width: 850px ;height: 300px;background-color: lightblue;border: 1px solid burlywood;margin-left: 600px;padding-right: 200px " align="center">
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
                <textarea rows="3" cols="45" name="detail" required=""  ></textarea>
            </td>
        </tr>
         <tr>
            <td>
                <input type="reset" value="Clear" class="btn btn-danger">
            </td>
            <td>
                <input type="submit" name="done"  value="Add Offers" class="btn btn-success">
            </td>
        </tr>
    </table>
</form>
</div>
<?php
if(isset($_POST['done']))
{
    $p_id=$_POST['p_id'];
     $detail=$_POST['detail'];
    $run= mysqli_query($con, "INSERT INTO `offers`(`p_id`, `o_detail`) VALUES ('$p_id','$detail')");
    if($run)
    {
    alert("Successfully Offers Add!");
    redirect_to("manage_offers.php");
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