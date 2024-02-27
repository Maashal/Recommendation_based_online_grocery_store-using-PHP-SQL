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
<h1 class="text text-capitalize text-center text-primary"style="color: Black">Return and Exchange Management Panel</h1>
<?php 
  $query="SELECT * FROM `issue_return_exchange` ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: wheat" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Product List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Customer Name</th>
       <th>Product Name</th>
       <th>Reason</th>
       <th style="text-align:center">Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $payment_id=$data['payment_id'];
            $customer_id=$data['customer_id'];
            $run1= mysqli_query($con, "SELECT * FROM `customer` where customer_id='$customer_id'");
            $data1= mysqli_fetch_assoc($run1);
            $run2= mysqli_query($con, "SELECT * FROM `approve_payment` where id='$payment_id'");
            $data2= mysqli_fetch_assoc($run2);
            $p_id=$data2['p_id'];
            $run3= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
            $data3= mysqli_fetch_assoc($run3);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data1['name']; ?></td>
                <td><?php echo $data3['p_name']; ?></td>
                <td><?php echo $data['reason']; ?></td>
                
                
                <td align="center"><a href="done.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Solve</a>
				<a href="exchangeitem.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Exchange item</a>
                  </td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No record is Found</h1>";
		
	}
    ?>