<?php
include_once "../dbconn.php";
$get_id= @$_GET['del'];
$qry= "DELETE FROM `blog` WHERE id='$get_id' ";
$run= mysqli_query($con, $qry);
if($run)
{
    echo "<script>alert('Deleted');window.open('view_blog.php','_self')</script>";
}
?>
