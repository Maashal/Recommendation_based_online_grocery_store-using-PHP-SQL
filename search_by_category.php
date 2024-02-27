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
<h1 class="text text-capitalize text-center text-primary" style="color: Black">Customer welcome</h1>
<form method="post">
    <table align="center">
        <tr>
            <td>
                Select Category:
            </td>
            <td>
                <select name="category">
                    <option value="Food">Food</option>
                     <option value="Clothes">Clothes</option>
                      <option value="House Hold">House Hold</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="done" value="Search By Category " class="btn btn-primary">
            </td>
        </tr>
    </table>
</form>
<?php
    include ("footer.php");
  if(isset($_POST['done']))
  {
      $category=$_POST['category'];
 $query="SELECT * FROM `product` where category='$category'";
$run= mysqli_query($con, $query);
if($run>=1)
{
while($data= mysqli_fetch_assoc($run))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color: lightblue;margin-left: 40px;margin-top: 20px;width: 20%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
            <img style="display: inline-block;display: flex;" src="<?php echo $data['pic']; ?>" width="150px" height="150px">
           
            <p style="display: inline-block;color: white">Product Name: <b><?php echo $data['p_name']; ?></b></p>
            <p style="display: inline-block;color: white">Product Detail: <b><?php echo $data['p_detail']; ?></b></p><br>
            
            <p style="display: inline-block;color: white">Item Price:<b> <?php echo $data['p_price']."Rs/Only"; ?></b></p><br>
           
           
            <a href="add_to_cart.php?id=<?php echo $data['p_id'];?>" class="btn btn-success" style="margin-left:60px;" >Add To Cart</a>
            
          
       <br>
       </div>
             <?php 
}
}
 else {
    echo "No Product Found";
}
  }
 ?>