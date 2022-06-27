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

function customer_id()
{
	global $db;
	
	$get_c_id="select * from customers";
	$run_c_id= mysqli_query($db, $get_c_id);
	$row= mysqli_fetch_array($run_c_id);
	
	$customer_id= $row['customer_id'];
	
}

//Creating Cart
function cart()
{
	if(isset($_GET['add_cart']))
	{
		global $db;
		
		$ip_add= getIPaddress();
		$customer_id= customer_id();
		
		$p_id= @$_GET['add_cart'];
		
		$check_pro = "select * from cart where customer_id= '$customer_id' AND p_id='$p_id'  "; 
		$run_check = mysqli_query($db, $check_pro);
		
		if(mysqli_num_rows($run_check)>0)
		{
			echo "";
		}
		else
		{
			$q= "insert into cart (p_id, ip_add) values ('$p_id','$customer_id')";
			
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
	$customer_id= customer_id();
	
	if(isset($_GET['add_cart']))
	{
		$getitems= "select * from cart where customer_id='$customer_id'";
		
		$runitems= mysqli_query($db, $getitems);
		
		$countitems= mysqli_num_rows($runitems);
	}
	else
	{
		global $db;
		
		$getitems= "select * from cart where ip_add='$customer_id'";
		
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
	echo "Rs ". $total. "/-";
}

?>





