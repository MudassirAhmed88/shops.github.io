<?php
error_reporting(0);
session_start();
include('function.php');
include('dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart </title>
<link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
<link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
<script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
<script src="biulded_files/bootstrap/js/jqry.js"></script>
<link href="dd/css/bootstrap.min.css" rel="stylesheet">
<link href="dd/css/font-awesome.min.css" rel="stylesheet">
<link href="dd/css/prettyPhoto.css" rel="stylesheet">
<link href="dd/css/price-range.css" rel="stylesheet">
<link href="dd/css/animate.css" rel="stylesheet">
<link href="dd/css/main.css" rel="stylesheet">
<link href="dd/css/responsive.css" rel="stylesheet">
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
	<div class="container">
	<div class="row breadcrumb">
		<div class="col-md-12">
			<?php cart(); ?>
			<div class="pull-left">
				<b class="text-success">
						<b>Welcome Guest</b>
				</b>
				</div>
				<div class="pull-right">
					<font class="" style="color:orange">
						<b>Your Shopping Cart</b>
					 </font> &nbsp;&nbsp;&nbsp;
					<b>Selected Items:-</b> <?php totalitems(); ?>&nbsp;&nbsp;&nbsp;
					<b>Total Price:-</b> <?php price(); ?>&nbsp;&nbsp;&nbsp;
				</div>
		</div>
	</div>
		<div class="header">
			<?php include('head.php'); ?>
		</div>
		
		<!--Menu-->
		<div class="menu">
			<?php include('menu.php'); ?>
		</div>
		
		<!--body-->
		<div class="body">
			<div class="right col-md-12">
				<!--/////View Products From Database/////-->				
				
				<div>
					<?php getIPaddress();?>
				</div>
				<br><br><br>
				
			<!--//////////Cart Body/////-->
				<div class="products row col-md-12">
					<!--///Form////-->
					<form action="cart.php" method="post" enctype="multipart/form-data">
						<!--///Cart Table/////-->
						</table>
						<table class="table table-responsive  text-center ">
							<tr style="background-color: #ffa500; color: white;">
								<td>Remove</td>
								<td>Product</td>
								<td>Quantity</td>
								<td>Select Size</td>
								<td>Select Color</td>
								<td>Price (Single Product)</td>
							</tr>
							<tr>
<!--////Display Product IN cart-->
<?php
	$ip_add= getIPaddress();
	$total= 0;
	$set_price = "select * from cart where ip_add='$ip_add'";
	$run_price= mysqli_query($con, $set_price);
	
	while($record= mysqli_fetch_array($run_price))
	{
		$pro_id= $record['p_id'];
		
		$pro_price= "select * from product where product_id='$pro_id' ";
		$run_pro_price= mysqli_query($con, $pro_price);
		
		while($p_price=mysqli_fetch_array($run_pro_price))
		{
			$product_price= array($p_price['product_price']);
			$product_title= $p_price['product_title'];
			$product_image= $p_price['product_image1'];
			$values= array_sum($product_price);
			$total +=$values;
?>
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
								<td>
									<?php echo $product_title; ?><Br></php?>
									<img src="shopkeeper_accounts/image/product_image/<?php echo $product_image; ?>" height="60" width="80">
								</td>
								<td class="col-md-2">
									<form name="myform">
										<input type="number" value="1" min="1" name="qty" placeholder="Enter Quantity" class="form-control">
								</td>
								<td>
								<select name="p_size" required>
								<option>--Select Product size--</option>
								<option>Small</option>
								<option>Medium</option>
								<option>Large</option>
								<option>Extra-Large</option>
								</select>
								</td>
								<td>
								<select name="p_color" required>
								<option>--Select Color--</option>
								<option>Black</option>
								<option>Brown</option>
                                </select>
								</td>
								<?php
									if(isset($_POST['update']))
									{
										$qty= $_POST['qty'];
										$color= $_POST['p_color'];
										$size= $_POST['p_size'];
										$insert_qty= "update cart set qty='$qty', p_size='$size', p_color='$color' where ip_add='$ip_add' ";
										$run_qty= mysqli_query($con, $insert_qty);
										$total= $total*$qty;
									}
								?>
								<td class="text-danger"><?php echo "Rs".$values. "/-"; ?></td>
							</tr>
			<?php }}?>
			
						</table>
						<panel class="pull-right">
							<div class="">
								<div class="total_area">
									<ul>
										<li>Tax <span>Rs 0/-</span></li>
										<li>Shipping Cost <span>Free</span></li>
										<li>Total <span><?php echo "Rs ". $total. "/-"; ?></span></li>
									</ul>
									<tr class="button">
										<td><button name="update" class="btn btn-sm" style="Background-color: orange; color: white;">Update cart</button></td>
										<td><button name="continue" class="btn btn-sm" style="Background-color: orange; color: white;"><i class="fa fa-arrow-right"></i> Continue Shopping</button></td>
										<td><a href="buy_form.php" class="btn btn-sm btn" onclick="validation()" style="Background-color: orange; color: white;"><i class="fa fa-shopping-cart"></i> Buy Product</a></td>
									</tr>
									</form>
								</div>
							</div>
						</panel>

<?php
function update()
{
	global $con;
	if(isset($_POST['update']))
	{
	foreach($_POST['remove'] as $remove_id)
	{
		$remove_pro= "delete from cart where p_id='$remove_id'";
		$run_remove= mysqli_query($con,$remove_pro);
		if($run_remove)
		{
			echo "<script>window.open('cart.php','_self');</script>";
		}
	}
	}
if(isset($_POST['continue']))
	{
		echo "<script>window.open('index.php','_self');</script>";
	}
}
 echo @$up_cart=  update();
?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
<?php include('footer.php'); ?>
</body>
</html>