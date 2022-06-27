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
<title>Change Password</title>
</head>

<body>
	<div class="row">
    	<div class="col-md-12">
    		<ol class="breadcrumb">
    			<li class="active">
    				<i class="glyphicon glyphicon-dashboard"></i> Dashboard / Change Password
    			</li>
    		</ol>
   		</div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title"><i class="fa fa-key"></i> Change Password</div>
					</div>
					<div class="panel-body">
						<form class="from-horizental" method="post" action="">
							<div class="form-group row">
								<label for="password" class="col-md-2 control-label">Old Password:</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="old_password">
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-2 control-label">New Password:</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="new_password">
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-2 control-label">Conform New Password:</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="conform_password">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-offset-2 col-md-10">
									<input type="submit" name="change_password" class="btn btn-primary" value="Change Password">
								</div> 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


<?php
$shopkpr_email= $_SESSION['shopkeeper_email'];

if(isset($_POST['change_password']))
{
	$old_pass= $_POST['old_password'];
	$new_pass= $_POST['new_password'];
	$conform_pass= $_POST['conform_password'];
	
	if($old_pass == '' AND $new_pass == '' AND $conform_pass == '')
	{
		echo "<script>alert('Reqiured all Field');</script>";
	}
	else
	{
		$get_real_password= "select * from shopkeeper_accounts where shopkeeper_password='$old_pass' ";
		$run_real_password= mysqli_query($con, $get_real_password);
		if(mysqli_num_rows($run_real_password)==0)
		{
			echo "<script>alert('Your current password is not valid, Plz try again');</script>";
			exit();
		}
		if($new_pass!=$conform_pass)
		{
			echo "<script>alert('New password did not match, Plz try again');</script>";
			exit();
		}
		else
		{
			$update_pass= "update shopkeeper_accounts set shopkeeper_password='$new_pass' where shopkeeper_email='$shopkpr_email'";
			$run_update= mysqli_query($con, $update_pass);

			echo "<script>alert('Your password has been Change Succesfully');</script>";
			echo "<script>window.open('shop_dashboard.php', '_self');</script>";
		}
	}
	
}
?>