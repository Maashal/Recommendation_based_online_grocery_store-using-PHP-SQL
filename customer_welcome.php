<?php
session_start();
error_reporting(0);
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
    ?>

<a style="float:right;margin-top:20px;margin-right:20px;text-decoration:none;" class="btn btn-danger" href="logout.php"><b>Logout</b></a>
<h1 class="text text-capitalize text-center text-primary"style="color: Black">Customer welcome</h1>

<?php
    include ("footer.php");
$run1= mysqli_query($con, "SELECT * FROM `approve_payment` where Customer_id='$customer_id'");
$j=0;
$f=0;
$c=0;
$hh=0;
while( $data1= mysqli_fetch_assoc($run1))
{
   
    $p_id=$data1['p_id'];
    $run11= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
    $data11= mysqli_fetch_assoc($run11);
     $category=  $data11['category'];
    
    if($category=="Food")
    {
        $f++; 
       echo"1";
    }
    elseif ($category=="House Hold") {
    $hh++;
    echo"2";
   
}
else{
    $c++;
   
}
$j++; 
}?>
<h1 class="text text-center" style="color:black;">Suggested Products By Category:</h1>
<?php
if((($f>=$hh) AND ($f>=$c)))
{



$run2= mysqli_query($con, "SELECT * FROM `product` where category='Food'");
if($run2)
{
while($data2= mysqli_fetch_assoc($run2))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color: lightblue;margin-left: 40px;margin-top: 20px;width: 20%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
            <img style="display: inline-block;display: flex;" src="<?php echo $data2['pic']; ?>" width="150px" height="150px">
           
            <p style="display: inline-block;color: white">Product Name: <b><?php echo $data2['p_name']; ?></b></p>
            <p style="display: inline-block;color: white">Product Detail: <b><?php echo $data2['p_detail']; ?></b></p><br>
            
            <p style="display: inline-block;color: white">Item Price:<b> <?php echo $data2['p_price']."Rs/Only"; ?></b></p><br>
           
           
            <a href="add_to_cart.php?id=<?php echo $data2['p_id'];?>" class="btn btn-success" style="margin-left:30px;" >Add To Cart</a>
           
            <a href="review.php?id=<?php echo $data2['p_id'];?>" class="btn btn-warning" >Reviews</a>
       <br>
       </div>
             <?php 
}}}
if((($hh>=$f) AND ($hh>=c)))
{



$run3= mysqli_query($con, "SELECT * FROM `product` where category='House Hold'");
if($run3)
{
while($data3= mysqli_fetch_assoc($run3))
{
    
    ?>
	
<div  style="display: flex;display: inline-block;background-color: lightblue;margin-left: 40px;margin-top: 20px;width: 20%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
            <img style="display: inline-block;display: flex;" src="<?php echo $data3['pic']; ?>" width="150px" height="150px">
           
            <p style="display: inline-block;color: white">Product Name: <b><?php echo $data3['p_name']; ?></b></p>
            <p style="display: inline-block;color: white">Product Detail: <b><?php echo $data3['p_detail']; ?></b></p><br>
            
            <p style="display: inline-block;color: white">Item Price:<b> <?php echo $data3['p_price']."Rs/Only"; ?></b></p><br>
           
           
            <a href="add_to_cart.php?id=<?php echo $data3['p_id'];?>" class="btn btn-success" style="margin-left:30px;" >Add To Cart</a>
           
            <a href="review.php?id=<?php echo $data3['p_id'];?>" class="btn btn-warning" >Reviews</a>
       <br>
       </div>
             <?php 
}}}
if((($c>=$hh) AND ($c>=$f)))
{



$run4= mysqli_query($con, "SELECT * FROM `product` where category='Clothes'");
if($run4)
{
while($data4= mysqli_fetch_assoc($run4))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color: lightblue;margin-left: 40px;margin-top: 20px;width: 20%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
            <img style="display: inline-block;display: flex;" src="<?php echo $data4['pic']; ?>" width="150px" height="150px">
           
            <p style="display: inline-block;color: white">Product Name: <b><?php echo $data4['p_name']; ?></b></p>
            <p style="display: inline-block;color: white">Product Detail: <b><?php echo $data4['p_detail']; ?></b></p><br>
            
            <p style="display: inline-block;color: white">Item Price:<b> <?php echo $data4['p_price']."Rs/Only"; ?></b></p><br>
           
            <a href="add_to_cart.php?id=<?php echo $data4['p_id'];?>" class="btn btn-success" style="margin-left:30px;" >Add To Cart</a>
           
            <a href="review.php?id=<?php echo $data4['p_id'];?>" class="btn btn-warning" >Reviews</a>
       <br>
       </div>
             <?php 

} }}
?>
<br>
<br>
<hr>
<h1 style="color: black;text-align: center;">Price Based Products</h1>
<?php
 $query1="SELECT * FROM `product` where  p_price>'10' AND p_price<'100'";
$run6= mysqli_query($con, $query1);
if($run6)
{
while($data6= mysqli_fetch_assoc($run6))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color:lightblue ;margin-left: 40px;margin-top: 20px;width: 20%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
            <img style="display: inline-block;display: flex;" src="<?php echo $data6['pic']; ?>" width="150px" height="150px">
           
            <p style="display: inline-block;color: white">Product Name: <b><?php echo $data6['p_name']; ?></b></p>
            <p style="display: inline-block;color: white">Product Detail: <b><?php echo $data6['p_detail']; ?></b></p><br>
            
            <p style="display: inline-block;color: white">Item Price:<b> <?php echo $data6['p_price']."Rs/Only"; ?></b></p><br>
           
           
            <a href="add_to_cart.php?id=<?php echo $data6['p_id'];?>" class="btn btn-success" style="margin-left:30px;" >Add To Cart</a>
           
            <a href="review.php?id=<?php echo $data6['p_id'];?>" class="btn btn-warning" >Reviews</a>
       <br>
       </div>
             <?php 
}
}
 ?>

<hr>
<h1 class="text text-center" style="color:black;">All Products</h1>
<?php
 $query="SELECT * FROM `product`";
$run= mysqli_query($con, $query);
if($run)
{
while($data= mysqli_fetch_assoc($run))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color: lightblue;margin-left: 40px;margin-top: 20px;width: 20%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
            <img style="display: inline-block;display: flex;" src="<?php echo $data['pic']; ?>" width="150px" height="150px">
           
            <p style="display: inline-block;color: white">Product Name: <b><?php echo $data['p_name']; ?></b></p>
            <p style="display: inline-block;color: white">Product Detail: <b><?php echo $data['p_detail']; ?></b></p><br>
            
            <p style="display: inline-block;color: white">Item Price:<b> <?php echo $data['p_price']."Rs/Only"; ?></b></p><br>
           
           
            <a href="add_to_cart.php?id=<?php echo $data['p_id'];?>" class="btn btn-success" style="margin-left:30px;" >Add To Cart</a>
           
            <a href="review.php?id=<?php echo $data['p_id'];?>" class="btn btn-warning" >Reviews</a>
       <br>
       </div>
             <?php 
}
}
 ?>
