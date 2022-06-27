<?php
include('include/dbconn.php');

//Getting Customer ID
$c= $_SESSION['customer_email'];
	
	$get_c= "select * from customers where customer_email='$c'";
	$run_c= mysqli_query($db, $get_c);
	
	$row_c= mysqli_fetch_array($run_c);
	
	$customer_id= $row_c['customer_id'];

?>

<br>
<table class="table table-striped table-hover">
	<tr class="text-center text-primary">
		<td colspan="10"><h4><b>Order Detail's</b></h4></td>
	</tr>
	<tr class="text-primary">
		<th>S/NO</th>
		<th>Product Name</th>
		<th>Shop Name</th>
		<th>Due Amount</th>
		<th>Invoice No</th>
		<th>Total Product</th>
		<th>Order Date</th>
		<th>Paid/Unpaid</th>
		<th>Status</th>
	</tr>
	<?php
		$get_orders="select * from customer_orders where customer_id='$customer_id'";
		$run_orders= mysqli_query($con, $get_orders);
		
		$S_NO=1;
		while($row_orders=mysqli_fetch_array($run_orders))
		{
			$order_id= $row_orders['order_id'];
			$shop_id= $row_orders['shop_id'];
			$product_name= $row_orders['product_name'];
			$due_amount= $row_orders['due_amount'];
			$invoice_no= $row_orders['invoice_no'];
			$products= $row_orders['total_products'];
			$date= $row_orders['order_date'];
			$status= $row_orders['order_status'];
			
			if($status=='Pending')
			{
				$status='UnPaid';
			}
			else
			{
				$status='Paid';
			}
			?>
			<tr>
				<td><?php echo $S_NO++; ?></td>
				<td><?php echo $product_name; ?></td>
				<td>
					<?php
					$qry= "select * from shopkeeper_accounts where shop_id='$shop_id'";
					$run_name= mysqli_query($con,$qry);
					$row= mysqli_fetch_array($run_name);
					echo $shop_name= $row['shop_name']; 
					?>
				</td>
				<td><?php echo $due_amount; ?></td>
				<td><?php echo $invoice_no; ?></td>
				<td><?php echo $products; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $status; ?></td>
				<td><a href="conform.php?order_id=<?php echo $order_id ?>" class="text-danger fa fa-check-square"> Conform if Paid</a></td>
			</tr>
			<?php
		}
	?>
</table>