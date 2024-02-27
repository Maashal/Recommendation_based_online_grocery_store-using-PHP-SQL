<?php
include("header.php");
include("dbconnection.php");
session_start();

if(isset($_SESSION['customer_id']))
{
    header("location:customer_welcome.php");
    exit();
}
?>
<h1 class="text text-center" style="color:black;">Customer Login Panel</h1>
<div style="margin-top:60px;margin-left:730px;width:32%" class="display">
        <form method="post">
            <table>
                <tr>
                    <th>Email:</th><tr>
                    <tr><th><input type="email" name="cemail" required placeholder="Please Enter your Email"></th>
                </tr>
                <tr>
                    <th>Password:</th><tr>
                <tr><th><input type="password" name="passwd" required placeholder="Please Enter your password"></th>
                </tr>
                <tr>
                    <th>Login As:</th></tr>
                    <tr><th><select  name="status">
                           
                            <option value="Customer">Customer</option>
                        </select></th>
                </tr>
                <tr>
                    <th><span style="margin-left:90px;"><input type="submit" value="Log In" name="done"></sapn></th>
                </tr>
            </table>  
        </form>
</div>
    </body>
</html>
<?php 
if(isset($_POST["done"]))
{
    $email=$_POST["cemail"];
    $password=$_POST["passwd"];
    $status=$_POST['status'];
    
     if($status=='Customer')
    {
    $query1="SELECT * FROM `customer` WHERE email='$email' AND password='$password'";
    $run1=mysqli_query($con,$query1);
    $row1=mysqli_num_rows($run1);
    if($row1<1)
    {
      alert("Email and Password is not Correct");
    }
    else
    {
        $data1=mysqli_fetch_assoc($run1);
        $id=$data1['customer_id'];
        $_SESSION['customer_id']=$id;
        alert("Welcome");
        redirect_to("customer_welcome.php");
    }
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




