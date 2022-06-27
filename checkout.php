<?php
session_start();
include('function.php');
include('dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home </title>
<link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
<link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
<script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
<script src="biulded_files/bootstrap/js/jqry.js"></script>
<style>
	body{
		background-color: #f1f1f1;
	}
	.slider{
		background-color: #CFC8C9;
		height: 250px;
	}	
	.products a{
		font-size: 12px;
	}
</style>
</head>

<body>
	<div>
		<div class="header">
			<?php include('head.php'); ?>
		</div>
		
		<!--Menu-->
		<div class="menu">
			<?php include('menu.php'); ?>
		</div>
		
		<!--body-->
		<div class="body">
			<div class="right container">
				<!--/////View Products From Database/////-->				
				<div class="bg-success col-md-12" style="padding: 5px;">
					<?php cart(); ?>
					<div class="pull-left">
						<b class="text-success">
							<?php
							if(!isset($_SESSION['customer_email']))
							{
								echo "<b>Welcome Guest</b>";
							}
							else
							{
								echo "<b>Welcome: ". $_SESSION['customer_email']. "</b>";;
							}
						?>
					</div>
					<div class="pull-right">
						</b> &nbsp;&nbsp;&nbsp;
						<font class="text-info">
						<?php
							if(!isset($_SESSION['customer_email']))
							{
								echo "<b>Shopping Cart</b>";
							}
							else
							{
								echo "<b>Your Shopping Cart</b>";
							}
							?>
						  </font> &nbsp;&nbsp;&nbsp;
						<b>Selected Items:-</b> <?php totalitems(); ?>&nbsp;&nbsp;&nbsp;
						<b>Total Price:-</b> <?php price(); ?>
						
						<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<a href='checkout.php' class='btn btn-success btn-sm'>Login</a>";
						}
						else
						{
							echo "<a href='logout.php' class='btn btn-danger btn-sm'>Logout</a>";
						}
						?>
					</div>
				</div>
				<div>
					<?php getIPaddress();?>
				</div>
				<br><br><br>
				<div class="products row col-md-12">
					<?php
					if(!isset($_SESSION['customer_email']))
					{
						include('customer/customer_login.php');
					}
					else
					{
						include('payment_option.php');
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>