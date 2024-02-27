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


<h1 class="text text-capitalize text-center text-primary" style="color: Black""margin-top: 25px">Manage Profile Panel </h1>
<?php 
  $query="SELECT * FROM `customer` where customer_id='$customer_id'";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: lightgray" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue;color: whitesmoke"><b>Customer Profile</b></caption>
          <tr >
       <th>S.No</th>
       <th>Customer Name</th>
       <th>Customer Gender</th>
       <th>Customer Email</th>
       <th>Customer Address</th>
       <th>Customer Contact</th>
      
       <th style="text-align:center">Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['gender']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['address']."/Rs"; ?></td>
                <td><?php echo $data['contact']; ?></td>
                
                <td align="center"><a href="delete_customer.php?id=<?php echo $data['customer_id'];?>" class="btn btn-warning">Delete</a>
                <a href="update_customer.php?id=<?php echo $data['customer_id'];?>" class="btn btn-primary">Update </a></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Custonmer record is Found</h1>";
		
	}
    ?>