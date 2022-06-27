<?php
include('include/dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
</head>

<body>
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="panel panel-info" style="margin-top: 20px; border-bottom: 2px solid #31b0d5;">
		<div class="panel-heading"><h4><span class="fa fa-key"></span> Change Password</h4></div>
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
						<input type="submit" name="change_password" class="btn btn-info" value="Change Password">
					</div> 
				</div>

			</form>
		</div>
	</div>
</div>
<div class="col-md-2"></div>
</body>
</html>


<?php
$c_email= $_SESSION['customer_email'];

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
		$get_real_password= "select * from customers where customer_password='$old_pass' ";
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
			$update_pass= "update customers set customer_password='$new_pass' where customer_email='$c_email'";
			$run_update= mysqli_query($con, $update_pass);

			echo "<script>alert('Your password has been Change Succesfully');</script>";
			echo "<script>window.open('my_account.php', '_self');</script>";
		}
	}
	
}
?>