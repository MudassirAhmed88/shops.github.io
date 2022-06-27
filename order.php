<?php
include('dbconn.php');
include('function.php');

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
$get_qty= mysqli_fetch_array($run_cart);
$qty= $get_qty['qty'];

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

//get shop id from product

$get_shopid= "select * from product where product_id='$pro_id'";
$run_get_shopid= mysqli_query($con, $get_shopid);
$row_shopid= mysqli_fetch_array($run_get_shopid);
$shop_id= $row_shopid['shop_id'];
$pro_name= $row_shopid['product_title'];

$name= $_POST['name'];
	$email= $_POST['email'];
	$contact= $_POST['contact'];
	$address= $_POST['address'];
	$country= $_POST['country'];
	$city= $_POST['city'];
	$payment_method= "Cash on delivery";

	$insert_order= "insert into customer_orders (`shop_id`, `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `country`, `city`,
	`product_name`, `due_amount`, 
   `total_products`, `product_size`, `order_date`, `order_status`, `remarks`) values 
('$shop_id','$name','$email','$contact', '$address','$country','$city', '$pro_name','$sub_total','$qty','','NOW()', '', '')";
$run_order= mysqli_query($con, $insert_order);

	echo "<script>alert('Order Succesfully Submitted.. Thank You');</script>";
	echo "<script>window.open('cart.php','_self');</script>";
	
	$empty_cart= "delete from cart where ip_add='$ip_add' ";
	$run_empty= mysqli_query($con, $empty_cart);
	
?>