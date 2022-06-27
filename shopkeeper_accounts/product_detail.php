<?php
include('include/dbconn.php');
$shopkpr_email= $_SESSION['shopkeeper_email'];
$qry= "select * from shopkeeper_accounts where shopkeeper_email='$shopkpr_email'";
$run_qry= mysqli_query($con, $qry);
$row_id=mysqli_fetch_array($run_qry);
$shop_id= $row_id['shop_id'];

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
 <link rel="stylesheet" type="text/css" href="datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="datatables/css/fixedHeader.bootstrap4.css">
<script src="js/jqry.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
	.action a{
		font-size: 15px;
	}	
</style>
</head>

<body>
	<div class="row">
    	<div class="col-md-12">
    		<ol class="breadcrumb">
    			<li class="active">
    				<i class="glyphicon glyphicon-dashboard"></i> Dashboard / View Product
    			</li>
    		</ol>
   		</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="breadcrumb">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<div class="panel-title"><i class="fa fa-info-circle"></i> Product Details</div>
    				</div>
    				<div class="panel-body">
    					<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>S/NO</th>
								<th>Product title</th>
								<th>Posted Date</th>
								<th>Image</th>
								<th>Price (Rs)</th>
								<th>Description</th>
								<th>Keyword</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
							<tr>
								<?php
								$view_pro= "select * from product where shop_id='$shop_id'";
								$run_pro= mysqli_query($con, $view_pro);

								$s_no=1;
								while($row=mysqli_fetch_array($run_pro))
								{
									$p_id= $row['product_id'];
									$p_title= $row['product_title'];
									$p_date= $row['product_date'];
									$p_image= $row['product_image1'];
									$p_price= $row['product_price'];
									$p_des= substr($row['product_description'], 0,50);
									$p_keyword= $row['product_keyword'];
									$p_status= $row['product_status'];
								?>
								<td><?php echo $s_no++; ?></td>
								<td><?php echo $p_title; ?></td>
								<td><?php echo $p_date; ?></td>
								<td><?php echo "<img src='image/product_image/$p_image' height='50' width='50'>"; ?></td>
								<td><?php echo $p_price; ?></td>
								<td><?php echo $p_des; ?> <br> <a href="">see more</a></td>
								<td><?php echo $p_keyword; ?></td>
								<td><?php echo $p_status; ?></td>
								<td class="action">
									<a href="delete_product.php?del=<?php echo $p_id;?>" class="text-danger"><i class="glyphicon glyphicon-remove"></i></a>
									&nbsp;
									<a href="shop_dashboard.php?edit=<?php echo $p_id;?>"><i class="fa fa-edit"></i></a>
								</td>
							</tr>
							<?php }?>
						</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
	
</body>
</html>