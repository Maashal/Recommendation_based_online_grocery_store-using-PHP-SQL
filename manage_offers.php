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

<h1 class="text text-capitalize text-center text-primary"style="color: Black">Offers Management Panel</h1>
<a href="add_offers.php" class="btn btn-primary" style="margin-left: 350px;">Add Offers</a>
<?php 
  $query="SELECT * FROM `offers` ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: darkgray" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightblue"><b>Product Offers List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Product Name</th>
       <th>Product Image</th>
       <th>Product Offer</th>
       <th style="text-align:center">Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $p_id=$data['p_id'];
            $result= mysqli_query($con, "SELECT * FROM `product` where p_id='$p_id'");
            $row= mysqli_fetch_assoc($result);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td><img src="<?php echo $row['pic']; ?>" width="100px" height="100px"></td>
                <td><?php echo $data['o_detail']; ?></td>
                <td align="center"><a href="delete_offer.php?id=<?php echo $data['o_id'];?>" class="btn btn-warning">Delete</a>
                    <a href="update_offer.php?id=<?php echo $data['o_id'];?>" class="btn btn-primary">Update </a></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Offers record is Found</h1>";
		
	}
    ?>