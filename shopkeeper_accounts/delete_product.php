<?php
include_once "../dbconn.php";
$get_id= $_GET['del'];

$qry="DELETE FROM `product` WHERE `product_id`='$get_id'";
$run= mysqli_query($con, $qry);
if($run)
{
    echo "<script>alert('Deleted');window.open('product_detail.php','_self')</script>";
}
?>