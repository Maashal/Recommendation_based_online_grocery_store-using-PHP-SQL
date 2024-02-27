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
    ?>

<h1 class="text text-capitalize text-center text-primary" style="color: Black">Customer Search Panel</h1>
<div style="margin-left: 300px">
<a href="search_by_category.php" class="btn btn-warning">Search By Category</a>
<a href="search_by_name.php" class="btn btn-warning">Search By Name</a>
<a href="search_by_price.php" class="btn btn-warning">Search By Price</a>
</div>
<?php
    include ("footer.php");
    ?>