<?php
$db = mysqli_connect('localhost', 'root', '',  'onlineshop');

function getIPaddress()
{
	//whether ip is from share internet
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   
	  {
		$ip_address = $_SERVER['HTTP_CLIENT_IP'];
	  }
	//whether ip is from proxy
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
	  {
		$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	  }
	//whether ip is from remote address
	else
	  {
		$ip_address = $_SERVER['REMOTE_ADDR'];
	  }
	
}

//Getting default for customer
function getDefault()
{
	global $db;
	$c= $_SESSION['customer_email'];
	
	$get_c= "select * from customers where customer_email='$c'";
	$run_c= mysqli_query($db, $get_c);
	
	$row_c= mysqli_fetch_array($run_c);
	
	$customer_id= $row_c['customer_id'];
	if(!isset($_GET['my_orders'])){
	if(!isset($_GET['edit_account'])){
	if(!isset($_GET['change_pass'])){
	if(!isset($_GET['delete_account'])){

	$get_order= "select * from customer_orders where customer_id='$customer_id' AND order_status='pending'";
	$run_orders= mysqli_query($db,$get_order);
	$count_orders= mysqli_num_rows($run_orders);
		
		if($count_orders>0)
		{
			?>
			<Br>
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="panel panel-info" style="border-bottom: 2px solid #31b0d5; ;">
					<div class="panel-heading">
						<h3 class="fa fa-gift"> Pending Orders</h3>
					</div>
					<div class="panel-body">
						<div class="alert alert-danger"><h4>Important!</h4></div>
						<h4>You have <?php echo "<font color='red'>($count_orders)</font>"?> Pending Orders </h4>
						<h4>Please see your orders detail by click this <a href="">Link</a></h4>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<?php
		}
		else
		{
			?><br>
			<div class="col-md-1"></div>
			<div class="col-md-10" style="">
				<div class="panel panel-info" style="border-bottom: 2px solid #31b0d5; ;">
					<div class="panel-heading">
						<h3 class="fa fa-gift"> Pending Orders</h3>
					</div>
					<div class="panel-body">
						<div class="alert alert-danger"><h4>Important!</h4></div>
						<h4>You have no pending orders</h4>
						<h4>You can see your order history by clicking this <a href="">Link</a></h4>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<?php
		}
		
			
}}}}
	
}

//Creating Cart
function cart()
{
	if(isset($_GET['add_cart']))
	{
		global $db;
		
		$ip_add= getIPaddress();
		
		$p_id= @$_GET['add_cart'];
		
		$check_pro = "select * from cart where ip_add= '$ip_add' AND p_id='$p_id'  "; 
		$run_check = mysqli_query($db, $check_pro);
		
		if(mysqli_num_rows($run_check)>0)
		{
			echo "";
		}
		else
		{
			$q= "insert into cart (p_id, ip_add) values ('$p_id','$ip_add')";
			
			$run_q= mysqli_query($db, $q);
			
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}

//Getting Number of Selected Items
function totalitems()
{
	global $db;
	$ip_add= getIPaddress();
	
	if(isset($_GET['add_cart']))
	{
		$getitems= "select * from cart where ip_add='$ip_add'";
		
		$runitems= mysqli_query($db, $getitems);
		
		$countitems= mysqli_num_rows($runitems);
	}
	else
	{
		global $db;
		
		$getitems= "select * from cart where ip_add='$ip_add'";
		
		$runitems= mysqli_query($db, $getitems);
		
		$countitems= mysqli_num_rows($runitems);
	}
	
	echo $countitems;
}

//Getting Price Of Selected Items
function price()
{
	global $db;
	$ip_add= getIPaddress();
	$total= 0;
	$set_price = "select * from cart where ip_add='$ip_add'";
	$run_price= mysqli_query($db, $set_price);
	
	while($record= mysqli_fetch_array($run_price))
	{
		$pro_id= $record['p_id'];
		
		$pro_price= "select * from product where product_id='$pro_id' ";
		$run_pro_price= mysqli_query($db, $pro_price);
		
		while($p_price=mysqli_fetch_array($run_pro_price))
		{
			$product_price= array($p_price['product_price']);
			$values= array_sum($product_price);
			$total +=$values;
		}
	}
	echo "$". $total;
}

?>





