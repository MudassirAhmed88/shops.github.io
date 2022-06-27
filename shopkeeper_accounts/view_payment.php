<?php
include('include/dbconn.php');
$shopkpr_email= $_SESSION['shopkeeper_email'];
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
<title>View Payment</title>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font awesome/css/all.min.css">
<script src="js/jqry.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
	.action a{
		font-size: 20px;
	}	
</style>
</head>
<body>
    <div class="row">
    	<div class="col-md-12">
    		<ol class="breadcrumb">
    			<li class="active">
    				<i class="glyphicon glyphicon-dashboard"></i> Dashboard / View Payments
    			</li>
    		</ol>
   		</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="breadcrumb">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<div class="panel-title"><i class="fa fa-rupee-sign"></i> View Payments</div>
    				</div>
    				<div class="panel-body">
    					<div class="table-responsive">
    						<table class="table table-hover table-striped">
    							<tr>
    								<th>S/No:</th>
    								<th>Invoice No:</th>
    								<th>Amount Paid</th>
    								<th>Payment Method</th>
    								<th>Refrence No</th>
    								<th>Payment Code</th>
    								<th>Payment Date</th>
    								<th>Action</th>
    							</tr>
    							<tr>
								<?php
									//Fetch Shop ID
									$qry= "select * from shopkeeper_accounts where shopkeeper_email='$shopkpr_email'";
									$run_qry= mysqli_query($con, $qry);
									$row_id=mysqli_fetch_array($run_qry);
									$shop_id= $row_id['shop_id'];
									
									//Display Payments in table
									$payment_qry="select * from payments where shop_id='$shop_id'";
									$run_payment= mysqli_query($con, $payment_qry);
									if(mysqli_num_rows($run_payment)==0)
									{
										?>
										<tr>
											<td colspan="20" class="text-center text-danger" style="font-size: 16px;"><b>You Have No Payment yet!!</b></td>
										</tr>
										<?php
									}
									else{
										$s_no=1;
										while($row_payment= mysqli_fetch_array($run_payment))
										{
											$id= $row_payment['payment_id'];
											$invoice_no= $row_payment['invoice_no'];
											$amount_paid= $row_payment['amount'];
											$payment_mehod= $row_payment['payment_mode'];
											$ref_no= $row_payment['ref_no'];
											$payment_code= $row_payment['code'];
											$payment_date= $row_payment['payment_date'];
											
									?>
   										
   										<td><?php echo $s_no++; ?></td>
   										<td><?php echo $invoice_no; ?></td>
   										<td><?php echo $amount_paid; ?></td>
   										<td><?php echo $payment_mehod; ?></td>
   										<td><?php echo $ref_no; ?></td>
   										<td><?php echo $payment_code; ?></td>
   										<td><?php echo $payment_date ?></td>
   										<td class="action">
   											<a href="delete_payment.php?del_payment=<?php echo $id; ?>"><i class="glyphicon glyphicon-remove text-danger"></i></a>
   											&nbsp;
   											<a href="approve.php?approve_paymeny=<?php echo $id; ?>"><i class="fa fa-check-circle"></i></a>
   										</td>
    							</tr>
    							<?php }}?>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</body>
</html>