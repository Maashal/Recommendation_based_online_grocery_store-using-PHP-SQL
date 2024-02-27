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
$run11= mysqli_query($con, "SELECT * FROM `customer` where customer_id='$id'");
$data= mysqli_fetch_assoc($run11);
    if(isset($_POST['done']))
{
$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$password=$_POST['pass'];
$gender=$_POST['gender'];
$run=mysqli_query($con,"UPDATE `customer` SET `name`='$name',`gender`='$gender',`email`='$email',`contact`='$contact',`address`='$address' WHERE customer_id='$id'");
if($run)
{
alert("Successfully Update Customer Record!");
redirect_to("customer_welcome.php");
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
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="stylesheet.css">
</head>

<body>

<h1 class="text text-center text-primary"> Customer Registration Panel</h1>

<form method="post" enctype="multipart/form-data">
<div class=" col">
<table align="center">
<tr>
<td> Name:</td>
<td><input type="text" name="name" value="<?php echo $data['name'];   ?>" autofocus="" class="form-control"></td>
</tr>
<tr>
<td>address:</td>
<td><input type="text" name="address" value="<?php echo $data['address'];   ?>" class="form-control"><td>
</tr>
<tr>
<td>Email:</td>
<td><input type="email" name="email" value="<?php echo $data['email'];   ?>" class="form-control"></td>
</tr>
<tr>
<td>Contact:</td>
<td><input type="text" name="contact" value="<?php echo $data['contact'];   ?>" class="form-control"></td>
</tr>
<tr>
    <td>Select Gender:</td>
<td>
<select name="gender" class="form-control"> 
<option value="Male">Male</option>
<option value="Female">Female</option>
</select></td>
</tr>
<tr>
    <td  align="center" colspan="2"><input type="submit" value="Update" name="done" class="btn btn-success"></td>
   
</tr>
</table>
</div>
</form>
<?php
include ("footer.php");
?>


