<?php
session_start();
include('include/dbconn.php');
//Fetch Shop ID
$shopkpr_email= $_SESSION['shopkeeper_email'];
$qry= "select * from shopkeeper_accounts where shopkeeper_email='$shopkpr_email'";
$run_qry= mysqli_query($con, $qry);
$row_id=mysqli_fetch_array($run_qry);
$shop_id= $row_id['shop_id'];
$semail= $row_id['shopkeeper_email'];

if(isset($_GET['order_id']))
{
	$order_id= $_GET['order_id'];
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home </title>
<link rel="stylesheet" href="font awesome/css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jqry.js"></script>
<style>
	body{
		background-color: #f1f1f1;
	}
	#sidebar li a{
		border-bottom: 1px solid lightgray;
		transition: 0.5s;
	}
	#sidebar li a:hover{
		color: whitesmoke;
		background-color: #337ab7;
	}
	.manage_account{
		margin-top: -19px;
		text-align: center;
	}
</style>
</head>

<body>


	<div>
		<div>
			<?php include('head.php'); ?>
		</div>
		<div>
			<?php include('include/menu.php'); ?>
		</div>
		
		<div>
			<div class="col-md-2">
				<ul class="row navbar navbar-default nav" id="sidebar" style="margin-top: -20px;">
					<li class="bg-primary" style="padding: 10px"><span class="fa fa-align-justify"></span> <b>Manage Account</b></li>
					<li style="text-align: center; padding-bottom: 3px; padding-top: 3px; border-bottom: 1px solid lightgray;"><?php
					if(isset($_SESSION['customer_email']))
					{
						$user_session= $_SESSION['customer_email'];
						$get_pic= "select * from customers where customer_email='$user_session'";
						$run_customer= mysqli_query($con,$get_pic);
						$row_customer= mysqli_fetch_array($run_customer);
						
						$customer_pic= $row_customer['customer_image'];
						$customer_email= $row_customer['customer_email'];
						echo "<img src='image/$customer_pic' width='180' height='180' class='img-circle'><br>";
						echo "<b class='text-danger'>Welcome: $customer_email</b>";
					}
					?></li>
					<li><a href="my_account.php"><span class="fa fa-university"></span> Dashboard</a></li>
					<li><a href="my_account.php?my_orders"><span class="fa fa-user-circle"></span> My Orders</a></li>
					<li><a href="my_account.php?edit_account"><span class="fa fa-edit"></span> Edit Account</a></li>
					<li><a href="my_account.php?change_pass"><span class="fa fa-key"></span> Change Password</a></li>
					<li><a href="my_account.php?delete_account"><span class="fa fa-times"></span> Delete Account</a></li>
					<li><a href="../logout.php"><span class="fa fa-sign-out-alt"></span> Logout</a></li>
				</ul>
			</div>
			<!--/////Account Managment////-->
			<div class="col-md-10">
				<div class="manage_account bg-primary row">
					<h4>Manage Account</h4>
				</div>
				
				<!--//////Conform Payment Option////////-->
				<br>
				<div class="col-md-1"></div>
				<div class="col-md-10" style="border-bottom: 2px solid #31b0d5;">				
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4><span class="fa fa-check-square"></span> Plz Conform your Payment</h4>
						</div>
						<div class="panel-body">
						
						<!--////////Confrom Payment Form////////-->
							<form class="form-inline" action="conform.php?update_id=<?php echo $order_id; ?>" method="post">
								<div class="form-group">
									<label for="name">Invoice No:</label>
									<input type="text" name="invoice_no" required class="form-control">
								</div>
								<div 
								<v class="form-group">
									<label for="name">Amount Paid:</label>
									<input type="text" name="amount" required class="form-control">
								</div> <br><br>

								<div class="form-group">
									<label>Select Payment Mode:</label>
									<select class="form-control" name="payment_method">
										<option>--Select Payment Mode--</option>
										<option>Bank Transfer</option>
										<option>Easypaisa</option>
										<option>Jazz Cash</option>
										<option>Omni</option>
										<option>Paypal</option>
									</select>
								</div>

								<div class="form-group">
									<label for="name">Transection/Reffrence ID:</label>
									<input type="text" name="tr" required class="form-control">
								</div> <br><br>

								<div class="form-group">
									<label for="name">Easypaisa/Jazz Cash/Omni Code:</label>
									<input type="text" name="code" required class="form-control">
								</div>

								<div class="form-group">
									<label for="name">Payment Date:</label>
									<input type="date" name="date" required class="form-control">
								</div><br><br>
								
								<div>
									<input type="submit" name="conform" value="Conform Payment" class="btn btn-info">
								</div>
							
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>
<?php	
if(isset($_POST['conform']))
{
	$update_id= @$_GET['update_id'];
	
	$invoice= $_POST['invoice_no'];
	$amount= $_POST['amount'];
	$payment_method= $_POST['payment_method'];
	$ref_no= $_POST['tr'];
	$code= $_POST['code'];
	$date= $_POST['date'];
	
	$complete= 'Complete';
	
	$insert_payment= "INSERT INTO `payments`(`shop_id`,`invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES ('$shop_id','$invoice','$amount','$payment_method','$ref_no','$code','$date')";
	
	$run_payment= mysqli_query($con, $insert_payment);
	
	if($run_payment)
	{
		?>
		<div class="col-md-2"></div>
		<div class="alert alert-success col-md-8" style="font-size: 18px; "><a href="#" class="close" data-dismiss="alert">x</a>Payment recived, your order will be completed within 24 hours</div>
		<div class="col-md-2"></div>
		<?php
	}
	
	$update_order= "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";
	$run_order= mysqli_query($con, $update_order);
}
?>






