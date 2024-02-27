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

<h1 class="text text-capitalize text-center text-primary"style="color: Black">Payment Management Panel</h1>
<?php 
  $query="SELECT * FROM `payment_request` ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color:darkgray" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Product List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Product Name</th>
       <th>Product Image</th>
       <th>Customer Name</th>
       <th>Amount</th>
       <th>Bank</th>
       <th>Method</th>
       <th style="text-align:center">Action</th>
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
                <td><?php echo $data1['p_name']; ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" width="100px" height="100px"></td>
                <td><?php echo $data2['name']; ?></td>
                <td><?php echo $data['amount']; ?></td>
                <td><?php echo $data['bank']; ?></td>
                <td><?php echo $data['method']; ?></td>
                
                <td align="center"><a href="approve_payment.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Approve Payment</a>
                <a href="reject_payment.php?id=<?php echo $data['id'];?>" class="btn btn-primary">Reject Payment</a></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Payment record is Found</h1>";
		
	}
    ?>