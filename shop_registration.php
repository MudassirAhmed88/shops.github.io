<?php
session_start();
include('shopkeeper_accounts/include/function.php');
include('shopkeeper_accounts/include/dbconn.php');
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ShopKeeper Registration</title>
	<link rel="stylesheet" href="shopkeeper_accounts/css/bootstrap.min.css">
	<script src="shopkeeper_accounts/js/bootstrap.min.js"></script>
	<script src="shopkeeper_accounts/js/jqry.js"></script>	
<style>
	body{
		background-image: url(shopkeeper_accounts/image/bg_image.png);
		background-attachment: fixed;
		background-repeat: no-repeat;
	}
	#adminlabel{
		color: #c4aa23;
	}
	#textbox{
		border: 1px solid #c4aa23;
	}
	.shopkeeper_registration{
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
	<div class="col-md-12">
	 		<div id="model_dialog" class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<form method="post" action="shop_registration.php" enctype="multipart/form-data">
							 <div class="admin_login">
								<h3 align="center" style="color: #c4aa23;">SHOP REGISTRATION</h3>
								<hr>

								<div class="form-group">
									<label id="adminlabel" class="control-label">SHOP NAME</label>
									<input id="textbox" class="form-control" name="s_title" type="text" placeholder="Email" autocomplete="off">
								</div>
								
								<div class="form-group">
									<label id="adminlabel" class="control-label">SHOP LOCATION</label>
									<input id="textbox" class="form-control" name="s_location" type="text" placeholder="Shop Location" autocomplete="off">
								 </div>
								 
								 <div class="form-group">
								 	<label id="adminlabel">SHOP CETOGORY</label>
								 	<select id="textbox" name="s_cat" class="form-control">
								 		<option>--Select Shop Cetagory--</option>
										<?php
										$viewsidebar_qry="select * from cetogories";
										$viewsidebar_result=mysqli_query($con, $viewsidebar_qry);

										while($row= mysqli_fetch_array($viewsidebar_result))
										{
											$cat_id= $row['cetogory_id'];
											$cat_list= $row['cetagory_title'];

											echo "<option value='$cat_id'>$cat_list</option>";
										}
										?>
								 	</select>
								 </div>
								 
								 <div class="form-group">
									<label id="adminlabel" class="control-label">SHOPS IMAGES</label>
									<input name="s_image" type="file" autocomplete="off">
								 </div>
								
								<div class="form-group">
									<label id="adminlabel" class="control-label">SHOPKEEPER NAME</label>
									<input id="textbox" class="form-control" name="s_name" type="text" placeholder="Shopkeeper Name" autocomplete="off">
								</div>
								
								<div class="form-group">
									<label id="adminlabel" class="control-label">SHOPKEEPER EMAIL</label>
									<input id="textbox" class="form-control" name="s_email" type="text" placeholder="Shopkeeper Email" autocomplete="off">
								</div>
								
								<div class="form-group">
									<label id="adminlabel" class="control-label">SHOPKEEPER PASSWORD</label>
									<input id="textbox" class="form-control" name="s_password" type="password" placeholder="Shopkeeper Password" autocomplete="off">
								</div>

								<div class="form-group">
									<label id="adminlabel" class="control-label">SHOPKEEPER CONTACT</label>
									<input id="textbox" class="form-control" name="s_contact" type="text" placeholder="Shopkeeper Contact" autocomplete="off">
								 </div>
								 
								 
								 <div class="form-group">
								 	<label id="adminlabel">SELECT COUNTRY</label>
								 	<select id="textbox" name="s_country" class="form-control">
								 		<option>Pakistan</option>
								 	</select>
								 </div>
								 
								 <div class="form-group">
								 	<label id="adminlabel">SELECT CITY</label>
								 	<select id="textbox" name="s_city" class="form-control">
								 		<option>KARAK</option>
								 	</select>
								 </div>

								 <div class="form-group" style="color: white;">
									<button class="btn btn-block" style="background-color: #c4aa23"  type="submit" name="register">
									Register <span class="glyphicon glyphicon-log-in"></span></button>
								 </div>

								 <div align="right" style="color: cadetblue">
									<a href="shop_login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a>
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
if(isset($_POST['register']))
{
	$shop_name= $_POST['s_title'];
	$shop_location= $_POST['s_location'];
	$shop_cetagory= $_POST['s_cat'];
	$shop_image= $_FILES['s_image']['name'];
	$shop_image_tmp= $_FILES['s_image']['tmp_name'];
	move_uploaded_file($shop_image_tmp, "shopkeeper_accounts/image/$shop_image");
	
	
	$s_name= $_POST['s_name'];
	$s_email= $_POST['s_email'];
	$s_password= $_POST['s_password'];
	$s_contact= $_POST['s_contact'];
	$s_country= $_POST['s_country'];
	$s_city= $_POST['s_city'];
	
	$shop_ip= getIPaddress();
	
	$shopkpr_reg_qry= "INSERT INTO `shopkeeper_accounts`(`cetagory_id`, `shop_name`, `shop_location`, `shop_image`, `shopkeeper_name`, `shopkeeper_email`, `shopkeeper_password`, `shopkeeper_contact`, `shopkeeper_country`, `shopkeeper_city`, `shop_ip`) VALUES ('$shop_cetagory','$shop_name','$shop_location','$shop_image','$s_name','$s_email','$s_password','$s_contact','$s_country','$s_city','$shop_ip')";
	
	$run_shopkpr_reg_qry= mysqli_query($con, $shopkpr_reg_qry);
	
	if($run_shopkpr_reg_qry)
	{
		?>
		<script>
			alert('Account Registerd succsfully..Thank You for being part of ONLINESHOP','');
			window.open('shopkeeper_accounts/shop_login.php','_self');
		</script>
		<?php
	}
}


?>

