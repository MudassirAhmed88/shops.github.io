<?php
include('include/dbconn.php');
session_start();
if(isset($_SESSION['shopkeeper_email']))
{
	echo "";
}
else
{
	header('location:shop_login.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ShopKeeper Dashboard</title>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font awesome/css/all.min.css">
<script src="js/jqry.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
	body{
		padding-top: 60px;
	}
</style>
</head>

<body>
	<div>
		<div class="" >
			<!--Sidebar-->
			<?php include('shop_sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<?php include('shop_head.php'); ?>
			
			<!--////Body////-->
			<?php
			if(isset($_GET['dashboard']))
			{
				include('dashboard.php');
			}
			if(isset($_GET['detail_pro']))
			{
				include('product_detail.php');
			}
			if(isset($_GET['detail_order']))
			{
				include('view_orders.php');
			}
			if(isset($_GET['detail_payment']))
			{
				include('view_payment.php');
			}
			
			
			if(isset($_GET['add_products']))
			{
				include('add_product.php');
			}
			
			if(isset($_GET['view_products']))
			{
				include('product_detail.php');
			}
			
			if(isset($_GET['customer']))
			{
				include('view_orders.php');
			}
            if(isset($_GET['verified_order']))
            {
                include('verified_order.php');
            }
            if(isset($_GET['rejected_order']))
            {
                include('rejected_order.php');
            }


			
			if(isset($_GET['edit_password']))
			{
				include('edit_password.php');
			}
			
			if(isset($_GET['payment']))
			{
				include('view_payment.php');
			}
            if(isset($_GET['edit']))
            {
                include_once "edit_product.php";
            }
            if(isset($_GET['edit_pro']))
            {
                include_once "profile.php";
            }
            if(isset($_GET['profile']))
            {
                include_once "profile.php";
            }
			
			?>

		</div>
	</div>
</body>
</html>