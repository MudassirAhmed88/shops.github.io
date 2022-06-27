<?php
session_start();
include('function.php');
include('dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration </title>
<link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
<link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
<script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
<script src="biulded_files/bootstrap/js/jqry.js"></script>
<style>

</style>
</head>

<body>
	<div>
		<div class="header">
			<?php include('head.php'); ?>
		</div>
		
		<!--Menu-->
		<div class="menu">
			<?php include('include/menu.php'); ?>
		</div>
		
		<!--body-->
		<div class="body">
			<div class="right col-md-12">
				<!--/////View Products From Database/////-->				
				<div class="bg-success col-md-12" style="padding: 5px;">
					<?php cart(); ?>
					<div class="pull-right">
						<b class="text-success">Welcome Guest!</b> &nbsp;&nbsp;&nbsp;
						<font class="text-info">Shopping Cart - </font> &nbsp;&nbsp;&nbsp;
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
				<div class="products" style="width: 800px;  margin: auto;">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4>Customer Registration</h4>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="customer_register.php" method="post" enctype="multipart/form-data">
							
							<div class="form-group row">
								<label for="name" class="col-md-2 control-label">Name:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="customer_name">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="email" class="col-md-2 control-label">Email:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="customer_email">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="password" class="col-md-2 control-label">Password:</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="customer_password">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="country" class="col-md-2 control-label">Select Country:</label>
								<div class="col-md-8">
									<select name="country" class="form-control">
										<option>--Select Country--</option>
										<option>Pakistan</option>
									</select>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="city" class="col-md-2 control-label">Select City:</label>
								<div class="col-md-8">
									<select name="city" class="form-control">
										<option>--Select City--</option>
										<option>KaraK</option>
										<option>Kohat</option>
										<option>Bannu</option>
									</select>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="contect" class="col-md-2 control-label">Contect:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="customer_contect">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="textarea" class="col-md-2 control-label">Address:</label>
								<div class="col-md-8">
									<textarea class="form-control" name="customer_address"></textarea>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="image" class="control-label col-md-2">Choose Image:</label>
								<div class="col-md-8">
									<input type="file" name="customer_image">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-offset-2 col-md-10">
									<button name="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$c_name= $_POST['customer_name'];
	$c_email= $_POST['customer_email'];
	$c_password= $_POST['customer_password'];
	$c_country= $_POST['country'];
	$c_city= $_POST['city'];
	$c_contect= $_POST['customer_contect'];
	$c_address= $_POST['customer_address'];
	
	$c_image= $_FILES['customer_image']['name'];
	$c_image_temp= $_FILES['customer_image']['tmp_name'];
	move_uploaded_file($c_image_temp, "customer/image/$c_image");
	
	$c_ip= getIPaddress();
	
	$registr_qry= "INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES ('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contect','$c_address','$c_image','$c_ip')";
	
	$registr_run= mysqli_query($con, $registr_qry);
	
	$sel_cart= "select * from cart where ip_add='$c_ip'";
		
	$run_cart= mysqli_query($con, $sel_cart);

	$chech_cart= mysqli_num_rows($run_cart);
	if($chech_cart>0)
	{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Account Created Succssfully..ThankYou');</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
	else
	{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Account Created Succssfully..ThankYou');</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
	
}
?>