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
<h1 class="text text-capitalize text-center text-primary"style="color: Black">Admin welcome</h1>
<?php
 $query="SELECT * FROM `product`";
$run= mysqli_query($con, $query);
if($run)
{
while($data= mysqli_fetch_assoc($run))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color: lightblue ;margin-left: 40px;margin-top: 20px;width: 20%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
            <img style="display: inline-block;display: flex;" src="<?php echo $data['pic']; ?>" width="150px" height="150px">
           
            <p style="display: inline-block;">Product Name: <b><?php echo $data['p_name']; ?></b></p>
            <p style="display: inline-block;">Product Detail: <b><?php echo $data['p_detail']; ?></b></p><br>
            
            <p style="display: inline-block;">Item Price:<b> <?php echo $data['p_price']."Rs/Only"; ?></b></p><br>
           
           
            
            
          
       <br>
       </div>
             <?php 
}
}
 ?>
