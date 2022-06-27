<?php
session_start();
include('../dbconn.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="font awesome/css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jqry.js"></script>
<style>
</style>
</head>

<body>
	<div>
		<div class="" >
			<!--Sidebar-->
			<?php include('sidebar.php'); ?>
		</div>
		
		<div class="col-md-9">
			<!--/////head/////-->
			<div class="head">
				<?php include('head.php'); ?>
			</div>

            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard
                        </li>
                    </ol>
                </div>
            </div>
			
			<!--//////Admin Body/////-->
			<div class="adminbody">
				<div class="col-md-3">
					<div class="panel panel-success">
                        <?php
                        $shop_qry="select * from shopkeeper_accounts ";
                        $shop_result=mysqli_query($con, $shop_qry);
                        $shop= mysqli_num_rows($shop_result);
                        ?>
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-3">
									<span class="fa fa-university" style="font-size: 4.5em;"></span>
								</div>
								<div class="col-md-9 text-right">
									<div style="font-size: 2.5em"><?php echo $shop; ?></div>
									<div style="font-size: 1.5em">Total Shops</div>
								</div>
							</div>
						</div>
						<a href="shop_detail.php" class="text-success">
							<div class="panel-footer ">
								<div class="pull-left">Shops Details</div>
								<div class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></div>
								<div class="clearfix"></div>	
							</div>
						</a>
					</div>
				</div>
					
				<div class="col-md-3">
					<div class="panel panel-primary">
                    <!--/////View Cetagories number/////-->
                    <?php
                        $getcat_qry="select * from cetogories ";
                        $getcat_result=mysqli_query($con, $getcat_qry);
                        $row= mysqli_num_rows($getcat_result);
                    ?>
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-3">
									<span class="fa fa-list-ul" style="font-size: 4.5em;"></span>
								</div>
								<div class="col-md-9 text-right">
									<div style="font-size: 2.5em"><?php echo $row;  ;?></div>
									<div style="font-size: 1.5em">Cetogories</div>
								</div>
							</div>
						</div>
						<a href="add_cetogory.php" class="text-success">
							<div class="panel-footer ">
								<div class="pull-left">Cetagories Details</div>
								<div class="pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span></div>
								<div class="clearfix"></div>	
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>