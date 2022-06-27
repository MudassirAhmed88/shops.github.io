<?php
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
<title></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font awesome/css/all.min.css">
<script src="js/jqry.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
	.menu li a{
		font-size: 15px;
		transition: 0.5s;
		border-bottom: 1px lightgray solid;
	}
	#menu_list li a:hover{
		border-left: 2px solid #337ab7;
	}
</style>
</head>

<body>
	<div class="">
		<div class="menu col-md-3" id="sidebar">
			<!--/////List//////-->
			<ul id="menu_list" class="navbar navbar-default nav" style="height: 72vh;">
				<li><a href="shop_dashboard.php?dashboard" ><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
				
					<li><a data-toggle="collapse" href="#new"><span class="fa fa-list"></span> Products 
						   <span class="caret"></span></a>
						<ul class="collapse nav" id="new">
							<li><a href="shop_dashboard.php?add_products"><div class="col-md-1"></div><span class="glyphicon glyphicon-plus">
							</span> Add Products</a></li>
							<li><a href="shop_dashboard.php?view_products"><div class="col-md-1"></div><span class="glyphicon glyphicon-eye-open">
							</span> View Products</a></li>
						</ul>
					</li>		
				<li><a href="shop_dashboard.php?customer"><span class="fa fa-male"></span> Customer Orders</a></li>
				<!--<li><a href="shop_dashboard.php?payment"><span class="fa fa-rupee-sign"></span> Payments</a></li>-->
				<li><a href="shop_dashboard.php?edit_password"><span class="fa fa-key"></span> Change Password </a></li>
				<li><a href="logout.php"><span class="fa fa-sign-out-alt"></span> Logout</a></li>
					
			</ul>
		</div>
	</div>
</body>
</html>


