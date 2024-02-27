<?php
include("header.php");
include("dbconnection.php"); 
session_start();
if(isset($_SESSION['aid']))
{
    header("location:adminwelcome.php");
    exit();
}
?>

<h1 class="text text-capitalize text-center text-primary" style="color: Black">Login Panel</h1>

<form method="post" class="display"style="margin-left: 600px;">

    <table align="center" style="margin-left: -30px">
    <tr><td><p style="">Enter Email:</p></td>
        <td><input type="email" name="email" required placeholder="Please Enter Your Email" style="margin-bottom: 20px"></td></tr>
    <tr><td><p style="">Enter Password:</p></td><td>
    <input type="password" name="pass" required placeholder="Please Enter Your Password"  style="margin-bottom: 20px"></td></tr>
    <tr><td align="right"></div></td>
    <td ><input type="submit" name="login" value="Login"  style="margin-left: 20px">
       
    </td></tr>

</table>

</form>

    
</body>
</html>
<?php 
if(isset($_POST["login"]))
{
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $query="SELECT * FROM `admin` WHERE email='$email' AND password='$pass'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    if($row<1)
    {?>
    <script>

        alert('Email and Password is not Correct');
        </script>
<?php
    }
    else
    {
        $data=mysqli_fetch_assoc($run);
        $id=$data['admin_id'];
        $_SESSION['admin_id']=$id;
			header("location:adminwelcome.php");
		}
    }
    
?>