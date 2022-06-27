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

</style>
</head>

<body>
	<div class="row">
		<div id="menubar" class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-brand">
				<?php
				$shopkpr_email= $_SESSION['shopkeeper_email'];
				include('include/dbconn.php');
				if($_SESSION['shopkeeper_email'])
				{
					$qry= "select * from shopkeeper_accounts where shopkeeper_email='$shopkpr_email'";
					$run= mysqli_query($con, $qry);
					$row= mysqli_fetch_array($run);
					$id= $row['shop_id'];
					$shopname= $row['shop_name'];
					echo $shopname;
				}
				?>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="CMS.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li class="dropdown">
					<a data-toggle="dropdown" class="data-toggle" href=".dropdown-menu"><span class="glyphicon glyphicon-user"></span>
						<?php
						if(isset($_SESSION['shopkeeper_email']))
						{
							echo $_SESSION['shopkeeper_email'];
						}
						?>
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="shop_dashboard.php?profile=<?php echo $id; ?>"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="#"><i class="fa fa-wrench"></i> Setting</a></li>
							<hr>
							<li><a href="logout.php" style="color: red"><i class="fa fa-sign-out-alt"></i> LogOut</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
<div>