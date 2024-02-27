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
$run11= mysqli_query($con, "SELECT * FROM `product` where p_id='$id'");
$data= mysqli_fetch_assoc($run11);
if(isset($_POST['done']))
{
$name=$_POST['pname'];
$price=$_POST['price'];
$detail=$_POST['detail'];
if(empty($_FILES["pic"]["name"]))
{
    $folder=$data['pic'];
}
 else {
    $filename=$_FILES["pic"]["name"];
    $tempname=$_FILES["pic"]["tmp_name"];
    $folder="product_img/".$filename;
    move_uploaded_file($tempname,$folder);
}
$run=mysqli_query($con,"UPDATE `product` SET `p_name`='$name',`p_detail`='$detail',`pic`='$folder',`p_price`='$price' WHERE p_id='$id'");
if($run)
{
alert("Successfully Update Product!");
redirect_to("manage_product.php");
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
<div style="width: 750px ;height: 300px;background-color: lightblue;border: 1px solid burlywood;margin-left: 400px;padding-right: 200px " align="center">
<form method="post" enctype="multipart/form-data">
    <table >
        <tr>
            <td>
                Product Name:
            </td>
            <td>
                <input type="text" name="pname" value="<?php  echo $data['p_name'];?>"  autofocus="">
            </td>
        </tr>
         <tr>
            <td>
                Product Price:
            </td>
            <td>
                <input type="text" name="price" value="<?php  echo $data['p_price'];?>" >
            </td>
        </tr>
         <tr>
            <td>
                Product Detail:
            </td>
            <td>
                <input type="text" name="detail" value="<?php  echo $data['p_detail'];?>">
            </td>
        </tr>
         <tr>
            <td>
                Product Picture:
            </td>
            <td>
                <input type="file" name="pic"  class="form-control">
            </td>
        </tr>
         <tr>
            <td>
                <input type="reset" value="Clear" class="btn btn-danger">
            </td>
            <td>
                <input type="submit" name="done"  value="Update Product" class="btn btn-success">
            </td>
        </tr>
    </table>
</form>
</div>