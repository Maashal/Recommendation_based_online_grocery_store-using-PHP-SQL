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
<?php
 $query="SELECT * FROM `product`";
$run= mysqli_query($con, $query);
if($run)
{
while($data= mysqli_fetch_assoc($run))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color:lightblue ;margin-left: 40px;margin-top: 20px;width: 17%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
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
