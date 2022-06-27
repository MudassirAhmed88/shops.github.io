<?php
@session_start();
include('include/dbconn.php');

if(isset($_GET['edit_account']))
{
	$customer_email= $_SESSION['customer_email'];
	
	$get_customer= "select * from customers where customer_email='$customer_email'";
	$run_customer= mysqli_query($con, $get_customer);
	
	$row= mysqli_fetch_array($run_customer);
	
	$id= $row['customer_id'];
	$name= $row['customer_name'];
	$email= $row['customer_email'];
	$password= $row['customer_password'];
	$country= $row['customer_country'];
	$city= $row['customer_city'];
	$contect= $row['customer_contact'];
	$address= $row['customer_address'];
	$image= $row['customer_image'];
	
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Account</title>
</head>
<body><br>
<div class="col-md-1"></div>
	<div class="col-md-10" >
		<div class="panel panel-info" style="border-bottom: 2px solid #31b0d5;">
		<div class="panel-heading">
			<h4><span class="fa fa-edit"></span> Edit Account Info</h4>
		</div>
		<div class="panel-body" style="height: 53vh; overflow: scroll;">
		<!--///////////////Update Customer Account////////////-->
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							
			<div class="form-group row">
				<label for="name" class="col-md-2 control-label">Name:</label>
				<div class="col-md-8">
					<input type="text" value="<?php echo $name; ?>" class="form-control" name="c_name">
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-md-2 control-label">Email:</label>
				<div class="col-md-8">
					<input type="text" value="<?php echo $email; ?>" class="form-control" name="c_email">
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-2 control-label">Password:</label>
				<div class="col-md-8">
					<input type="password" value="<?php echo $password; ?>" class="form-control" name="c_password">
				</div>
			</div>

			<div class="form-group row">
				<label for="country" class="col-md-2 control-label">Select Country:</label>
				<div class="col-md-8">
					<select name="c_country" class="form-control" disabled>
						<option value="<?php echo $name; ?>"><?php echo $country; ?></option>
						<option>Pakistan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="city" class="col-md-2 control-label">Select City:</label>
				<div class="col-md-8">
					<select name="c_city" class="form-control">
						<option><?php echo $city; ?></option>
						<option>KaraK</option>
						<option>Kohat</option>
						<option>Bannu</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="contect" class="col-md-2 control-label">Contect:</label>
				<div class="col-md-8">
					<input type="text" value="<?php echo $contect; ?>" class="form-control" name="c_contect">
				</div>
			</div>

			<div class="form-group row">
				<label for="textarea" class="col-md-2 control-label">Address:</label>
				<div class="col-md-8">
					<input type="text" class="form-control" value="<?php echo $address; ?>" name="c_address">
				</div>
			</div>

			<div class="form-group row">
				<label for="image" class="control-label col-md-2">Choose Image:</label>
				<div class="col-md-8">
					<input type="file" name="c_image"> <img src="image/<?php echo $image; ?>" height="80" width="80">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<input type="submit" value="Update Account" name="update" class="btn btn-info">
				</div>
			</div>

			</form>
		</div>
	</div>
	</div>
</body>
</html>

<?php
$customer_email= $_SESSION['customer_email'];

if(isset($_POST['update']))
{
	$update_id= $id;
	
	$c_name= $_POST['c_name'];
	$c_email= $_POST['c_email'];
	$c_password= $_POST['c_password'];
	$c_city= $_POST['c_city'];
	$c_contect= $_POST['c_contect'];
	$c_address= $_POST['c_address'];
	
	$c_image=$_FILES['c_image']['name'];
	$c_image_temp= $_FILES['c_image']['tmp_name'];
	move_uploaded_file($c_image_temp, "image/$c_image");
	
	//Validation of fields
	if($c_name == '' OR $c_email=='' OR $c_password == '' OR $c_city == '' OR $c_contect == '' OR $c_address == '' OR $c_image == '')
	{
		echo "<script>alert('All field are reqiured');</script>";
		exit();
	}
	else
	{	
		//Update Query to update records
		$update_c= "update customers set customer_name='$c_name', customer_email='$c_email', customer_password='$c_password', customer_city='$c_city', customer_contact='$c_contect', customer_address='$c_address', customer_image='$c_image' where customer_id='$update_id' ";

		$run_c= mysqli_query($con,$update_c);

		if($run_c)
		{
			?>
			<script>
				alert('Account Updated Succesfully');
				window.open('my_account.php','_self');

			</script>
			<?php
		}
	}
}



?>