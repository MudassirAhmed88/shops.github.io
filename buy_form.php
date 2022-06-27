<?php
include('dbconn.php');
include('function.php');
?>

<html>
<head>
    <title>Conform Order</title>
    <link rel="stylesheet" href="css/buy_from.css">
    <link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
	<link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
	<script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
	<script src="biulded_files/bootstrap/js/jqry.js"></script>
</head>
<body>
<?php include('head.php'); ?>
<?php include('menu.php'); ?>
<div class="container">
  <div class="title">
      <h2>Product Order Form</h2>
  </div>
<div class="d-flex col-md-12">
   <div class="col-md-8">
   	<div align="center">
   		 <img src="image/logo/logo.png" class="img-responsive;"> <br>
		 <font color="red"><b>All * fields required</b></font>
   	</div>

	   <!--/////Order Product Form////////-->

   	<form action="" method="post">
   		<div class="form-group">
			<label for="name">Name*</label>
			<input type="text" name="name" class="form-control">
		</div>
  		<div class="form-group">
  			<label for="name">Delivery Address*</label>
  			<textarea name="address"></textarea>
  		</div>
  		<div class="form-group">
			<label for="name">Country*</label>
			<select name="country">
				<option>--Country--</option>
				<option>--Pakistan--</option>
			</select>
		</div>
  		<div class="form-group">
			<label for="name">City*</label>
			<select name="city">
				<option>--Karak--</option>
			</select>
		</div>
 		<div class="form-group">
			<label for="name">Contact*</label>
			<input type="text" value="+92" name="contact" required class="form-control">
		</div>
  		<div class="form-group">
			<label for="name">Email*</label>
			<input type="text" name="email" class="form-control">
		</div>
		<button name="submit">Place Order</button>
   	</form>
   </div>    
  <div class="Yorder col-md-4">
      <table class="table">
      <tr>
        <th colspan="2">Your order</th>
      </tr>
   <?php
	  $ip_add= getIPaddress();
		$total= 0;
		$set_price = "select * from cart where ip_add='$ip_add'";
		$run_price= mysqli_query($con, $set_price);
	  	if(mysqli_num_rows($run_price) == 0)
		{
			echo "<font color='red'>plz select product first*</font>";
		}
	  else
	  {
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
      <tr>
      <td align="center"><img src="shopkeeper_accounts/image/product_image/<?php echo $product_image; ?>" height="60" width="80"></td>
      </tr>
      <tr>
        <td>Product Name</td>
        <td><?php echo $product_title; ?></td>
      </tr>
      <tr>
        <td>Price (per product)</td>
        <td><?php echo  "Rs ". $values. "/-"; ?></td>
      </tr>
	  <tr>
        <td>Quantity</td>
        <td><?php echo   " Only/-"; ?></td>
      </tr>
      <tr>
        <td>Shopping</td>
        <td>Free shopping</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>Rs 0/-</td>
      </tr>
      <tr class="bg-danger">
      	<td colspan="2"><h3>Total Price</h3><?php echo "Rs ".$total. "/-"; ?></td>
      </tr>
	  <?php }}?>
    </table><br>
    <?php }?>
  </div><!-- Yorder -->
 </div>
</div>
<br><br><br><Br><Br>
<?php include('footer.php'); ?>
</body>
<html>

<?php
//Getting Product Price and No of items
$ip_add= getIPaddress();
$total= 0;
$set_price = "select * from cart where ip_add='$ip_add'";
$run_price= mysqli_query($con, $set_price);
$status= "Pending";
$invoice_no= mt_rand();
$count_pro= mysqli_num_rows($run_price);

while($record= mysqli_fetch_array($run_price))
{
	$pro_id= $record['p_id'];

	$pro_price= "select * from product where product_id='$pro_id' ";
	$run_pro_price= mysqli_query($con, $pro_price);

	while($p_price=mysqli_fetch_array($run_pro_price))
	{
		$product_price= array($p_price['product_price']);
		$values= array_sum($product_price);
		$total +=$values;
	}
}

//Get Quantity
$get_cart= "select * from cart where ip_add='$ip_add' ";
$run_cart= mysqli_query($con, $get_cart);
while($get_qty= mysqli_fetch_array($run_cart))
{
$qty= $get_qty['qty'];
$p_size= $get_qty['p_size'];
$p_color= $get_qty['p_color'];
}
if($qty==0)
{
	$qty=1;
	$sub_total = $total;
}
else
{
	$qty=$qty;
	$sub_total= $total*$qty;
}

if(isset($_POST['submit']))
{
	$name= $_POST['name'];
	$email= $_POST['email'];
	$contact= $_POST['contact'];
	$address= $_POST['address'];
	$size= $_POST['size'];
	$country= $_POST['country'];
	$city= $_POST['city'];
	$status= 'pending';
	$payment_method= "Cash on delivery";

	//get shop id from product

	$get_shopid= "select * from product where product_id='$pro_id'";
	$run_get_shopid= mysqli_query($con, $get_shopid);
	$row_shopid= mysqli_fetch_array($run_get_shopid);
	$shop_id= $row_shopid['shop_id'];
	$pro_name= $row_shopid['product_title'];
	
	if($name== '' OR $email== '' OR $contact== '' OR $address=='' OR $country=='' OR $city== '')
	{
		echo "<script>alert('All * Fields Reqiured');</script>";
	}
	else
	{
	$insert_order= "insert into customer_orders (`shop_id`,`product_id`, `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `country`, `city`, `product_name`, `due_amount`,`total_products`,`product_size`,`product_color`,`order_date`, `order_status`, `remarks`) values 
	('$shop_id','$product_id','$name','$email','$contact', '$address','$country','$city', '$pro_name','$sub_total','$qty','$p_size',
	'$p_color',NOW(), '$status', '')";

	$run_order= mysqli_query($con, $insert_order);

		if($run_order)
		{
			echo "<script>alert('Order Succesfully Submitted.. Thank You');</script>";
			echo "<script>window.open('cart.php','_self');</script>";
			
			$empty_cart= "delete from cart where ip_add='$ip_add' ";
			$run_empty= mysqli_query($con, $empty_cart);
		}
	}
	
}
?>