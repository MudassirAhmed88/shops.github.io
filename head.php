<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
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
	.header-middle{
		border-bottom: 1px solid orange;
		padding: 10px;
	}
</style>
</head>

<body>
<div class="container">
	<div class="header-middle"><!--header-middle-->
	<div class="row" style="padding: 10px;">
		<div class="col-sm-4">
			<div class="logo pull-left">
				<a href="index.php"><img src="image/logo/logo.png" alt="" / height="40"></a>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="shop-menu pull-right">
				<ul class="nav navbar-nav">
					<li><a href="cart.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
					<li><a href="cart.php"><i class="fa fa-shopping-cart"></i>Cart &nbsp <span class="badge pull-right" style="background-color: darkorange"><?php totalitems(); ?></span></a></li>
					<li><a href="admin/admin_login.php"><i class="fa fa-lock"></i>Admin Login</a></li>
				</ul>
			</div>
		</div>
	</div>
</div><!--/header-middle-->
</div>
</body>
</html>
