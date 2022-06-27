<?php
@session_start();
include('include/dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Here </title>
<link href="css/css/bootstrap.min.css" rel="stylesheet">
<link href="css/css/font-awesome.min.css" rel="stylesheet">
<link href="css/css/prettyPhoto.css" rel="stylesheet">
<link href="css/css/price-range.css" rel="stylesheet">
<link href="css/css/animate.css" rel="stylesheet">
<link href="css/css/main.css" rel="stylesheet">
<link href="css/css/responsive.css" rel="stylesheet">
<body>
	<div class="col-md-3"></div>
	<div class="col-md-4 col-sm-offset-1">
			<div class="login-form"><!--login form-->
				<h2>Login to your account</h2>
				<form action="checkout.php" method="post">
					<div class="form-group">
						<input type="gmail" name="Customer_name" placeholder="Customer_name" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="password" name="Customer_password" placeholder="Customer_password" class="form-control" required>
					</div>
					<div class="text-right" style="font-size: 12px;">
						<a href="#"><i>forget password</i></a>
					</div>
					<div class="form-group">
						<button name="login" class="btn btn-block">Customer Login <span class="glyphicon glyphicon-log-in"></span></button>
					</div>
				</form>
			</div><!--/login form-->
		</div>

</body>
</html>
<?php
	if(isset($_POST['login']))
	{
		$customer_email= $_POST['Customer_name'];
		$customer_password= $_POST['Customer_password'];
		
		$customer_qry= "select * from customers where customer_email='$customer_email' AND customer_password='$customer_password' ";
		$customer_run= mysqli_query($con, $customer_qry);
		
		$check_customer = mysqli_num_rows($customer_run);
		
		$get_ip= getIPaddress();
		
		$sel_cart= "select * from cart where ip_add='$get_ip'";
		
		$run_cart= mysqli_query($con, $sel_cart);
		
		$chech_cart= mysqli_num_rows($run_cart);
		
		if($check_customer==0)
		{
			echo "<script>alert('password or email are incorrect try again');</script>";
			exit();
		}
			if($check_customer==1 AND $chech_cart==0)
			{
				$_SESSION['customer_email']= $customer_email;
				
				echo "<script>window.open('customer/my_account.php','self');</script>";
			}
			else
			{
				$_SESSION['customer_email']= $customer_email;
				
				echo "<script>window.open('payment_option.php','self');</script>";
			}
		
	}
?>




