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

<h1 class="text text-capitalize text-center text-primary"style="color: Black">Gifts Management Panel</h1>
<a href="add_gifts.php" class="btn btn-warning" style="margin-left: 350px;">Add Gifts</a>
<?php 
  $query="SELECT * FROM `gift_detail` ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: darkgray" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Gifts Winner List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Customer Name</th>
       <th>Customer Address</th>
       <th>Customer Contact</th>
       <th>Luck Draw Date</th>
       <th>Gift Detail</th>
       
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $customer_id=$data['customer_id'];
            $run1= mysqli_query($con, "SELECT * FROM `customer` where customer_id='$customer_id'");
            $data1= mysqli_fetch_assoc($run1);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data1['name']; ?></td>
                <td><?php echo $data1['address']; ?></td>
                <td><?php echo $data1['contact']; ?></td>
                <td><?php echo $data['ld_date']; ?></td>
                <td><?php echo $data['detail']; ?></td>
                
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Gifts record is Found</h1>";
		
	}
    ?>