<?php include_once "function.php";?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

	<link href="dd/css/bootstrap.min.css" rel="stylesheet">
    <link href="dd/css/font-awesome.min.css" rel="stylesheet">
    <link href="dd/css/prettyPhoto.css" rel="stylesheet">
    <link href="dd/css/price-range.css" rel="stylesheet">
    <link href="dd/css/animate.css" rel="stylesheet">
	<link href="dd/css/main.css" rel="stylesheet">
	<link href="dd/css/responsive.css" rel="stylesheet">
<style>

</style>
</head>

<body>
	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="index.php">Home</a></li>
							<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="all_products.php">All Products</a></li>
									<li><a href="shop_detail.php">Shops Details</a></li> 
									<li><a href="cart.php">Checkout</a></li>
									<li><a href="cart.php">Cart</a><span class="badge pull-right" style="background-color: darkorange"><?php totalitems(); ?></span></li>
								</ul>
							</li>
							</li> 
							<li class="dropdown"><a href="#"> Accounts<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="shopkeeper_accounts/shop_login.php">Shopkeeper Account</a></li>
								</ul>
							</li>
                            <li><a href="blog.php">Blog</a>
                            <li><a href="about_us.php">About Us</a></li>
							<li><a href="contect_us.php">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
                        <form method="get" action="search.php" class="searchform">
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Search by Product Name..." required autocomplete="off" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="submit" style="margin-top: ;"><span class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</body>
</html>