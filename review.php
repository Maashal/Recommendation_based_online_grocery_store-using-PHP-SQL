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
echo $product_id=$_GET['id'];
$result= mysqli_query($con, "SELECT * FROM `product` where p_id='$product_id'");
$row= mysqli_fetch_assoc($result);
    ?>
<h1 class="text text-capitalize text-center text-primary"style="color: Black">Customer Review Panel</h1>
 <a href="add_review.php?id=<?php echo $product_id;?>" class="btn btn-success" style="margin-left:350px;" >Add Reviews</a>
<?php
    include ("footer.php");
    $query="SELECT * FROM `review` where product_id='$product_id' ";
  $run=mysqli_query($con,$query);
  $row2=mysqli_num_rows($run);
  
  if($row2>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b>Customer Review</b></caption>
          <tr >
       <th>S.No</th>
       <th>Product Name</th>
       <th>Customer Name</th>
       <th>Review</th>
      
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $customer_id=$data['customer_id'];
            $result1= mysqli_query($con, "SELECT * FROM `customer` where customer_id='$customer_id'");
            $row1= mysqli_fetch_assoc($result1);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td><?php echo $row1['name']; ?></td>
                <td><?php echo $data['review_detail']; ?></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
else
	
    {
		echo "<h1 class=heading>No Customer review record is Found</h1>";
		
}
    ?>