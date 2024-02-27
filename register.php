<?php
include("header.php");
include("dbconnection.php");
if(isset($_POST['done']))
{
$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$password=$_POST['pass'];
$gender=$_POST['gender'];
$run=mysqli_query($con,"INSERT INTO `customer`(`name`, `gender`, `email`, `contact`, `address`, `password`, `admin_id`) VALUES ('$name','$gender','$email','$contact','$address','$password','1')");
if($run)
{
alert("Successfully Register!");
redirect_to("index.php");
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

<h1 class="text text-center text-primary"style="color:black;"> Customer Registration Panel</h1>
<div style="width: 850px ;height: 400px;background-color:lightblue;border: 1px solid burlywood;margin-left: 600px;padding-right: 100px " align="center">
<form method="post" enctype="multipart/form-data" >
<div class=" col">
<table align="center" >
<tr>
<td> Enter Customer Name:</td>
<td><input type="text" name="name" required autofocus="" class="form-control"></td>
</tr>
<tr>
<td>Enter Customer address:</td>
<td><input type="text" name="address" required class="form-control"><td>
</tr>
<tr>
<td>Enter Customer Email:</td>
<td><input type="email" name="email" required class="form-control"></td>
</tr>
<tr>
<td>Enter Customer Contact:</td>
<td><input type="text" name="contact" required class="form-control"></td>
</tr>
<tr>
<td>Enter Customer Password:</td>
<td><input type="password" name="pass" required class="form-control"></td>
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
    <td  align="center"><input type="submit" value="Register" name="done" class="btn btn-success"></td>
    <td  align="center"><input type="reset" value="Reset" name="done1" class="btn btn-warning" style="height: 40px"></td>
</tr>
</table>
</div>
</form>
</div>
<?php
include ("footer.php");
?>


