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
    ?>

<h1 class="text text-capitalize text-center text-primary"style="color: Black">View Cart Panel</h1>
<a href="customer_welcome.php" class="btn btn-success" style="margin-left: 200px">Edit Cart</a>
<?php 
  $query="SELECT * FROM `shopping_cart` where customer_id='$customer_id' ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Cart Product List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Product Name</th>
       <th>Product Price</th>
       <th>Product Detail</th>
       <th>Product Image</th>
       <th style="text-align:center">Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php  $p_id=$data['p_id']; 
                $run1= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id' ");
                $data1= mysqli_fetch_assoc($run1);
                echo $data1['p_name'];
                ?></td>
                
                <td><?php echo $data1['p_price']."/"."Rs"; ?></td>
                <td><?php echo $data1['p_detail']; ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" width="100px" height="100px"></td>
                
                <td align="center"><a href="delete_cart_item.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Delete</a>
                    <a href="buy_product.php?id=<?php echo $data['p_id'];?>" class="btn btn-primary">Buy Item </a></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Item is Found</h1>";
		
	}
    ?>
