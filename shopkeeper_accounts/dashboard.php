<?php
include('include/dbconn.php');
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
<title>Untitled Document</title>
</head>

<body>
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>
			</div>
		</div>
	</div>
	<div class="row">
    	<div class="col-md-12">
    		<ol class="breadcrumb">
    			<li class="active">
    				<i class="glyphicon glyphicon-dashboard"></i> Dashboard
    			</li>
    		</ol>
   		</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    	<!--/////Total Products////////-->
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-3">
								<span class="fa fa-list" style="font-size: 4.5em;"></span>
							</div>
							<div class="col-md-9 text-right">
								<div style="font-size: 2.5em">
									<?php
									//Fetch Shop ID
									$shopkeepr_email= $_SESSION['shopkeeper_email'];
									$shop_qry= "select * from shopkeeper_accounts where shopkeeper_email='$shopkeepr_email'";
									$run_shop= mysqli_query($con,$shop_qry);
									$row_shop= mysqli_fetch_array($run_shop);
									$shop_id= $row_shop['shop_id'];
									$shop_password= $row_shop['shopkeeper_password'];
									
									//Fetch Total Products
									$total_pro= "select * from product where shop_id='$shop_id'";
									$run_pro= mysqli_query($con,$total_pro);
									echo $row_pro= mysqli_num_rows($run_pro);
									?>
								</div>
								<div style="font-size: 1.2em"><b>Total Products</b></div>
							</div>
						</div>
					</div>
					<a href="shop_dashboard.php?detail_pro">
						<div class="panel-footer ">
							<div class="pull-left">View Total Details</div>
							<div class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></div>
							<div class="clearfix"></div>	
						</div>
					</a>
				</div>
			</div>

   	<!--/////Pending Orders start////////-->
   			<div class="col-md-3">
				<div class="panel" style="background-color: darkorange; color: white;">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-3">
								<span class="fa fa-shopping-cart" style="font-size: 4.5em;"></span>
							</div>
							<div class="col-md-9 text-right">
								<div style="font-size: 2.5em">
									<?php 
									$total_order= "select * from customer_orders where shop_id='$shop_id' AND order_status='pending'";
									$run_order= mysqli_query($con,$total_order);
									echo $row_order= mysqli_num_rows($run_order);
									?>
								</div>
								<div style="font-size: 1.1em"><b>Pending Orders</b></div>
							</div>
						</div>
					</div>
					<a href="shop_dashboard.php?detail_order">
						<div class="panel-footer ">
							<div class="pull-left">View Pending Orders</div>
							<div class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></div>
							<div class="clearfix"></div>	
						</div>
					</a>
				</div>
			</div> <!--/////Pending Orders end////////-->

            <!--//////Completed Orders start/////-->
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="fa fa-check-circle" style="font-size: 4.5em;"></span>
                            </div>
                            <div class="col-md-9 text-right">
                                <div style="font-size: 2.5em">
                                    <?php
                                    $total_order= "select * from customer_orders where shop_id='$shop_id' AND order_status='Verified'";
                                    $run_order= mysqli_query($con,$total_order);
                                    echo $row_order= mysqli_num_rows($run_order);
                                    ?>
                                </div>
                                <div style="font-size: 1.2em"><b>Verified Orders</b></div>
                            </div>
                        </div>
                    </div>
                    <a href="shop_dashboard.php?verified_order">
                        <div class="panel-footer ">
                            <div class="pull-left">View Verified Orders</div>
                            <div class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div> <!--Completed order end-->

            <!--//////rejected Orders start/////-->
            <div class="col-md-3">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="glyphicon glyphicon-remove" style="font-size: 4.5em;"></span>
                            </div>
                            <div class="col-md-9 text-right">
                                <div style="font-size: 2.5em">
                                    <?php
                                    $total_order= "select * from customer_orders where shop_id='$shop_id' AND order_status='Rejected'";
                                    $run_order= mysqli_query($con,$total_order);
                                    echo $row_order= mysqli_num_rows($run_order);
                                    ?>
                                </div>
                                <div style="font-size: 1.2em"><b>Rejected Orders</b></div>
                            </div>
                        </div>
                    </div>
                    <a href="shop_dashboard.php?rejected_order">
                        <div class="panel-footer ">
                            <div class="pull-left">View Rejected Orders</div>
                            <div class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div> <!--rejected order end-->

   	
   			<div class="col-md-3">
				<!--<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-3">
								<span class="fa fa-rupee-sign" style="font-size: 4.5em;"></span>
							</div>
							<div class="col-md-9 text-right">
								<div style="font-size: 2.5em">
									<?php 
									$total_paymets= "select * from payments where shop_id='$shop_id'";
									$run_payments= mysqli_query($con,$total_paymets);
									echo $row_order= mysqli_num_rows($run_payments);
									?>
								</div>
								<div style="font-size: 1.5em">Payments</div>
							</div>
						</div>
					</div>
					<a href="shop_dashboard.php?detail_payment">
						<div class="panel-footer ">
							<div class="pull-left">View Payments</div>
							<div class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></div>
							<div class="clearfix"></div>	
						</div>
					</a>
				</div>
			</div> -->
    	</div>
    </div>
    <!--//////Customer Orders///////-->
    <div class="row">
    	<div class="col-md-12">
			<div class="col-md-8">
				<div class="table-responsive">
					<div class="panel panel-primary ">
						<div class="panel-heading">
							<div class="panel-title">New Orders</div>
						</div>
						<div class="panel-body">
							<table class="table table-condensed table-striped">
    						<tr>
    							<th>S/No</th>
								<th>Name</th>
								<th>Product</th>
								<th>QTY</th>
								<th>Amount(Rs)</th>
								<th>Contact</th>
								<th>Order Date</th>
   								<th>Status</th>
    						</tr>
    						<tr>
    							<?php
								$order_qry="select * from customer_orders where shop_id='$shop_id' AND order_status='pending' order by 1 desc limit 0,1";
								$run_order= mysqli_query($con, $order_qry);
								if(mysqli_num_rows($run_order)==0)
								{
									?>
									<tr>
										<td colspan="20" class="text-center text-danger" style="font-size: 16px;"><b>You Have No Orders</b></td>
									</tr>
									<?php
								}
								else{
								$s_no=1;
									while($row_order= mysqli_fetch_array($run_order))
									{
										$c_name= $row_order['customer_name'];
										$c_contact= $row_order['customer_contact'];
										$c_address= $row_order['customer_address'];
										$c_product= $row_order['product_name'];
										$c_amount= $row_order['due_amount'];
										$t_product= $row_order['total_products'];
										$c_date= $row_order['order_date'];
										$c_order= $row_order['order_status'];
								
								?>
    						</tr>
    						<tr>
    							<td><?php echo $s_no; ?></td>
    							<td><?php echo $c_name; ?></td>
    							<td><?php echo $c_product; ?></td>
								<td><?php echo $t_product ?></td>
    							<td><?php echo $c_amount; ?></td>
    							<td class="bg-danger"><?php echo $c_contact;  ?></td>
    							<td><?php echo $c_date; ?></td>
    							<td class="bg-success"><?php echo "<b>". $c_order. "</b>"; ?></td>
    						</tr>
    						<?php }}?>
    					</table>
						</div>
					</div>
				</div>
			</div>
            
            <div class="col-md-4">
                <div class="row">
                    <table class="table">
                        <tr class="bg-info">
                            <th colspan="2">Account Details</th>
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td><?php echo $shopkeepr_email; ?></td>
                        </tr>
                        <tr>
                            <th>Password:</th>
                            <td><?php echo $shop_password; ?></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><a href="shop_dashboard.php?edit_pro" class="btn btn-primary">Edit</a></td>
                        </tr>
                    </table>
                </div>
            </div>
    	</div>
    </div>
</body>
</html>