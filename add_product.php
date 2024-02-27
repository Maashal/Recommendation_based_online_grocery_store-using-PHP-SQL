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
<h1 class="text text-capitalize text-center text-primary"style="color:black;">Add Product Panel</h1>
<div style="width: 750px ;height: 400px;background-color: lightblue;border: 1px solid burlywood;margin-left: 600px;padding-right: 200px " align="center">
<form method="post" enctype="multipart/form-data">
    <table >
        <tr>
            <td>
                Select Product Category:
            </td>
            <td>
                <select name="category" >
                    <option value="Food">Food</option>
                    <option value="House Hold">House Hold</option>
                    <option value="Clothes">Clothes</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Product Name:
            </td>
            <td>
                <input type="text" name="pname" required="" placeholder="Enter Product Name" autofocus="">
            </td>
        </tr>
         <tr>
            <td>
                Product Price:
            </td>
            <td>
                <input type="text" name="price" required="" placeholder="Enter Product Price" >
            </td>
        </tr>
         <tr>
            <td>
                Product Detail:
            </td>
            <td>
                <input type="text" name="detail" required="" placeholder="Enter Product detail" >
            </td>
        </tr>
         <tr>
            <td>
                Product Picture:
            </td>
            <td>
                <input type="file" name="pic" required="" class="form-control">
            </td>
        </tr>
         <tr>
            <td>
                <input type="reset" value="Clear" class="btn btn-danger">
            </td>
            <td>
                <input type="submit" name="done"  value="Add Product" class="btn btn-success">
            </td>
        </tr>
    </table>
</form>
</div>
<?php
if(isset($_POST['done']))
{
    $name=$_POST['pname'];
     $price=$_POST['price'];
      $detail=$_POST['detail'];
      $category=$_POST['category'];
       $filename=$_FILES["pic"]["name"];
    $tempname=$_FILES["pic"]["tmp_name"];
    $folder="product_img/".$filename;
    move_uploaded_file($tempname,$folder);
    $run= mysqli_query($con, "INSERT INTO `product`(`p_name`, `p_detail`, `pic`, `p_price`, `category`) VALUES ('$name','$detail','$folder','$price','$category')");
    if($run)
    {
    alert("Successfully Product Add!");
    redirect_to("manage_product.php");
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