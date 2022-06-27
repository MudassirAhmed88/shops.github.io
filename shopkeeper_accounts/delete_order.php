<?php
include('include/dbconn.php');
$id= @$_GET['order_del'];

	$del_query= "DELETE FROM `customer_orders` WHERE order_id='$id' ";
	$run_qry= mysqli_query($con, $del_query);
	if($run_qry)
	{
		?>
		<script>
			alert('Order Deleted Succsfully');
			window.open('view_orders.php','_self');
		</script>
		<?php
	}


?>