<?php
session_start();
include('function/function.php');
include('include/dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Account </title>
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
	<?php
	if(isset($_SESSION['customer_email']))
	{ 
		?>
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
				<?php getDefault(); ?>
				
				<?php
				if(isset($_GET['my_orders']))
				{
					include('my_orders.php');
				}
				if(isset($_GET['edit_account']))
				{
					include('edit_account.php');
				}
				if(isset($_GET['change_pass']))
				{
					include('edit_password.php');
				}
				if(isset($_GET['delete_account']))
				{
					include('delete_account.php');
				}
				?>
				
			</div>
		</div>
		
	</div>
	<?php
	}
	else
	{
		echo "<script>window.open('../checkout.php', '_self');</script>";
	}
	
	?>
</body>
</html>