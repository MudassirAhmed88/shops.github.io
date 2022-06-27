<?php
include('function.php');
include('dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div class="row breadcrumb">
<div class="container">
					<div class="col-md-12">
						<div class="">
							<div>
							<?php cart(); ?>
							<?php getIPaddress();?>
							<div class="pull-left">
								<b style="color:#fe980f">
									Welcome Guest
								</b>
							</div>
							 <div class="pull-right">
								 </b> &nbsp;&nbsp;&nbsp;
								<font class="text-info">
										<b style='color: darkorange'><i class='fa fa-cart-plus'></i> Shopping Cart</b>
								</font> &nbsp;&nbsp;&nbsp;
								<b><i class="fa fa-check-circle"></i>Selected Items:-</b> <?php totalitems(); ?>&nbsp;&nbsp;&nbsp;
								<b>Total Price:-</b> <?php price(); ?>

								&nbsp;&nbsp;&nbsp;
								<a href="cart.php" class="btn btn-sm btn-warning" ><i class="fa fa-shopping-cart"></i> Cart</a>
							</div>
							</div>
						</div>
					</div>
				</div>
</div>
</body>
</html>