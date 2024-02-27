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

<h1 class="text text-capitalize text-center text-primary"style="color: Black">Shipment Management Panel</h1>
<?php

 



?>
<?php 
  $result= mysqli_query($con, "SELECT * FROM `approve_payment`");
  $row=mysqli_num_rows($result);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color:darkgray" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Product List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Product Name</th>
       <th>Product Price</th>
       
       <th>Product Image</th>
       <th>Customer Name</th>
       <th>Customer Address</th>
       <th>Customer Contact</th>
       <th style="text-align:center">Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($result))
        { 
            $apr_id=$data['id'];
            $p_id=$data['p_id'];
            $run1= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
            $data1= mysqli_fetch_assoc($run1);
            $customer_id=$data['customer_id'];
            $run2= mysqli_query($con, "SELECT * FROM `customer` where customer_id='$customer_id'");
            $data2= mysqli_fetch_assoc($run2);
            $result1= mysqli_query($con, "SELECT * FROM `delivery` where apr_id='$apr_id'");
            $row11= mysqli_num_rows($result1)
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data1['p_name']; ?></td>
                <td><?php echo $data1['p_price']."/"."Rs"; ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" width="100px" height="100px"></td>
                 <td><?php echo $data2['name']; ?></td>
                  <td><?php echo $data2['address']; ?></td>
                   <td><?php echo $data2['contact']; ?></td>
                   <?php
                   if($row11>=1)
                   {?>
                   <td><p style="color: red;">Delivered</p></td>
                   <?php
                   }
 else {?>
                <td align="center"><a href="deliver.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Make Delivery</a>
                    </td>
                    <?php
 }?>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Shipment record is Found</h1>";
		
	}
    ?>