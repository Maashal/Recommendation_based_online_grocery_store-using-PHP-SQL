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
<h1 class="text text-capitalize text-center text-primary" style="color: Black">Sales Management Panel</h1>
<?php 
  $query="SELECT * FROM `purchase_request` ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: grey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Purchase Request For Product List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Customer Name</th>
       <th>Customer Address</th>
       <th>Product Name</th>
       <th>Product Price</th>
       <th>Product Detail</th>
       <th>Product Image</th>
       <th style="text-align:left">Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $p_id=$data['p_id'];
            $run1= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
            $data1= mysqli_fetch_assoc($run1);
            $customer_id=$data['customer_id'];
            $run2= mysqli_query($con, "SELECT * FROM `customer` where customer_id='$customer_id'");
            $data2= mysqli_fetch_assoc($run2);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data2['name']; ?></td>
                <td><?php echo $data2['address']; ?></td>
                <td><?php echo $data1['p_name']; ?></td>
                <td><?php echo $data1['p_price']."/"."Rs"; ?></td>
                <td><?php echo $data1['p_detail']; ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" width="100px" height="100px"></td>
                
                <td align="center"><a href="reject_purchase_request.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Reject</a>
                    <a href="approve_purchase_request.php?id=<?php echo $data['id'];?>" class="btn btn-success">Approve </a></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Sales record is Found</h1>";
		
	}
    ?>