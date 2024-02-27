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
<h1 class="text text-capitalize text-center text-primary"style="color: Black">View Purchase Request Panel</h1>
<?php 
  $query="SELECT * FROM `purchase_request` where customer_id='$customer_id'";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  $query1="SELECT * FROM `reject_purchase_request` where customer_id='$customer_id' ";
  $run1=mysqli_query($con,$query1);
  $row1=mysqli_num_rows($run1);
  $query2="SELECT * FROM `approve_purchase_request` where customer_id='$customer_id' ";
  $run2=mysqli_query($con,$query2);
  $row2=mysqli_num_rows($run2);
  if($row>=1 OR $row1>=1 OR $row2>=1)
  {
  ?>
      <table align="center" style="margin-top:20px;width:90%;background-color: darkgray" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b> Purchase Request Status List</b></caption>
       <tr>
       <th>S.No</th>
       <th>Product Name</th>
       <th>Product Price</th>
       <th>Product Image</th>
       <th>Quantity</th>
       <th>Actual Price</th>
       <th>Total Discount Price</th>
       <th>Payment To Pay</th>
       <th>Status</th>
       </tr>
        <?php
        $i=1;
        if($row>=1)
        {
        while($data=mysqli_fetch_assoc($run))
        { 
            $p_id=$data['p_id'];
            $run11= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
            $data1= mysqli_fetch_assoc($run11);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data1['p_name']; ?></td>
                <td><?php echo $data1['p_price']; ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" width="70px" height="70px"></td>
                <td><?php echo $data['quantity']; ?></td>
                 <td><?Php echo $data['total_amount']; ?></td>
                <td><?Php echo $data['total_amount']*5/100; ?></td>
                <td><?Php echo $data['total_amount']-($data['total_amount']*5/100); ?></td>
                <td><p style="color: orange"><b>Pending</b></p></td></tr>
            <?php
        }
        }
        if($row1>=1)
        {
        while($data3=mysqli_fetch_assoc($run1))
        { 
            $p_id1=$data3['p_id'];
            $run12= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id1'");
            $data4= mysqli_fetch_assoc($run12);
            ?>
            <tr>
               <td><?php echo $i++;?></td>
                <td><?php echo $data4['p_name']; ?></td>
                <td><?php echo $data4['p_price']; ?></td>
                <td><img src="<?php echo $data4['pic']; ?>" width="70px" height="70px"></td>
                <td><?php echo $data3['quantity']; ?></td>
                <td><?Php echo $data3['total_amount']; ?></td>
                <td><?Php echo $data3['total_amount']*5/100; ?></td>
                 <td><?Php echo $data3['total_amount']-($data3['total_amount']*5/100); ?></td>
                <td><p style="color: red"><b>Reject</b></p></td></tr>
            <?php
        }
        }
        if($row2>=1)
        {
        while($data5=mysqli_fetch_assoc($run2))
        { 
            $p_id2=$data5['p_id'];
            $run13= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id2'");
            $data6= mysqli_fetch_assoc($run13);
            $apr_id=$data5['id'];
            $result= mysqli_query($con, "SELECT * FROM `approve_payment` where apr_id='$apr_id'");
                    $row11= mysqli_num_rows($result);
            ?>
            <tr>
               <td><?php echo $i++;?></td>
                <td><?php echo $data6['p_name']; ?></td>
                <td><?php echo $data6['p_price']; ?></td>
                <td><img src="<?php echo $data6['pic']; ?>" width="70px" height="70px"></td>
                <td><?php echo $data5['quantity']; ?></td>
                <td><?Php echo $data5['total_amount']; ?></td>
                <td><?Php echo $data5['total_amount']*5/100; ?></td>
                 <td><?Php echo $data5['total_amount']-($data5['total_amount']*5/100); ?></td>
                <td>
                
                     <a href="payment.php?id=<?php echo $data5['id'];?>" class="btn btn-primary">Payment </a>
                   
                </td>
               
                
            <?php
        }        
               ?>
            </tr>
        </table>
    <?php 
  }}
    ?>
