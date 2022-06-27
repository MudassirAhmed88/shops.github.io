<?php
session_start();
include('include/dbconn.php');
if(isset($_SESSION['shopkeeper_email']))
{
	header('location:shop_dashboard.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ShopKeeper Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jqry.js"></script>	
<style>
	body{
		background-color: #e5e5e5;
	}
	.jumbotron{
		border-bottom: 4px solid #0089B3;
	}
	#adminlabel{
		color: #c4aa23;
	}
	#textbox{
		border: 1px solid #c4aa23;
	}
	.admin_login{
		background-color: white;
		padding: 20px;
		margin: auto;
	}
	.btn:hover{
		color: white;
	}
	
</style>
</head>
<body>
	<div class="jumbotron" style="height: 250px; background-color: #c4aa23;">
	 <br><br><br><br>
	 <div class="modal-dialog ">
	 	<div class="modal-content ">
	 		<div class="modal-header">
	 			<form method="post" action="shop_login.php">
					 <div class="admin_login">
						<h3 align="center" style="color: #c4aa23;">SHOPKEEPER LOGIN</h3>
						<hr>
						
						<div class="form-group">
							<label id="adminlabel" class="control-label">SHOPKEEPER EMAIL</label>
							<input id="textbox" class="form-control" name="email" type="text" placeholder="Email" autocomplete="off">
						</div>
						
						<div class="">
							<label id="adminlabel" class="control-label">SHOPKEEPER PASSWORD</label>
							<input id="textbox" class="form-control" name="password" type="password" placeholder="Password" autocomplete="off">
						 </div>
						 
						 <div class="form-group" align="right">
						 	<a href="">Forget Password</a>
						 </div>
						 
						 <div class="form-group" style="color: white;">
							<button class="btn btn-block" style="background-color: #c4aa23"  type="submit" name="login">SHOPKEEPER LOGIN <span class="glyphicon glyphicon-log-in"></span></button>
						 </div>
						 
						 <div align="right" style="color: cadetblue">
						 	<a href="../shop_registration.php">New Registration</a>
						 </div>
					 </div>
				</form>
	 		</div>
	 	</div>
	 </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
	$shopkpr_email= $_POST['email'];
	$shopkpr_pass= $_POST['password'];
	
	$shopkpr_lgn_qry= "select * from shopkeeper_accounts where shopkeeper_email='$shopkpr_email' AND shopkeeper_password='$shopkpr_pass' ";
	$run_shopkpr_lgn_qry= mysqli_query($con, $shopkpr_lgn_qry);
	
	if(mysqli_num_rows($run_shopkpr_lgn_qry)>0)
	{
		$_SESSION['shopkeeper_email']=$shopkpr_email;
		echo "<script>window.open('shop_dashboard.php','_self');</script>";
	}
	else
	{
		echo "<script>alert('Sorry..!!!!! Email or Password is wrong, try again');</script>";
	}
}
?>

