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


<h1 class="text text-capitalize text-center text-primary" style="color: Black">Product Management Panel</h1>
<a href="add_product.php" class="btn btn-success" style="margin-left: 350px;">Add Product</a>
<?php 
  $query="SELECT * FROM `product` ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Product List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Product Name</th>
       <th>Category</th>
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
                <td><?php echo $data['p_name']; ?></td>
                <td><?php echo $data['category']; ?></td>
                <td><?php echo $data['p_price']."/"."Rs"; ?></td>
                <td><?php echo $data['p_detail']; ?></td>
                <td><img src="<?php echo $data['pic']; ?>" width="100px" height="70px"></td>
                
                <td align="center"><a href="delete_product.php?id=<?php echo $data['p_id'];?>" class="btn btn-warning">Delete</a>
                    <a href="update_product.php?id=<?php echo $data['p_id'];?>" class="btn btn-primary">Update </a></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Customer record is Found</h1>";
		
	}
    ?>