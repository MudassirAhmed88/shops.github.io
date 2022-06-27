<?php
include('dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home </title>
<link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
<link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
<script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
<script src="biulded_files/bootstrap/js/jqry.js"></script>
<style>

</style>
</head>

<body>
	<div class="container">
		<?php include('include/top_header.php'); ?>
		<div class="header">
			<?php include('head.php'); ?>
		</div>
		
		<!--Menu-->
		<div class="menu">
			<?php include('menu.php'); ?>
		</div>
		
		<!--body-->
		<div class="body">
			<!--////Slider////-->
			<div class="col-md-9">	
				<!--/////View Products Details From Database/////-->
			<div class="col-md-12">
					<?php
					if(isset($_GET['detail']))
					{
						//Get Product Details
						$pro_detail= @$_GET['detail'];
						$prodetail_qry="select * from product where product_id='$pro_detail'";
						$prodetail_result=mysqli_query($con, $prodetail_qry);


						while($row_products= mysqli_fetch_array($prodetail_result))
						{
							//Product Info
							$detail_id= $row_products['product_id'];
							$shop_id= $row_products['shop_id'];
							$detail_name= $row_products['product_title'];
							$detail_cat= $row_products['cetagory_id'];
							$detail_image1= $row_products['product_image1'];
							$detail_image2= $row_products['product_image2'];
							$detail_image3= $row_products['product_image3'];
							$detail_description= $row_products['product_description'];
							$detail_date= $row_products['product_date'];
							$detail_price= $row_products['product_price'];
							$detail_status= $row_products['product_status'];

							//Shop Info
							//Get Shop Details
							$get_shop_name="select * from shopkeeper_accounts where shop_id='$shop_id'";
							$run_shop_name= mysqli_query($con, $get_shop_name);
							$row_shop_name= mysqli_fetch_array($run_shop_name);
							$shop_image= $row_shop_name['shop_image'];
							$shop_name= $row_shop_name['shop_name'];
							$name= $row_shop_name['shopkeeper_name'];
							$email= $row_shop_name['shopkeeper_email'];
							$contect= $row_shop_name['shopkeeper_contact'];
							$location= $row_shop_name['shop_location'];
						}
					}
					?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="shopkeeper_accounts/image/product_image/<?php echo $detail_image1 ?>" alt="" />
								<img style="width: 100px; height: 100px" src="shopkeeper_accounts/image/product_image/<?php echo $detail_image2 ?>"/>
								<img style="width: 100px; height: 100px" src="shopkeeper_accounts/image/product_image/<?php echo $detail_image3 ?>"/>
							</div>
						</div>
						<div class="col-md-7">
							<div class="product-information "><!--/product-information-->
								<span>
									<span>Product Details</span>
								</span>
								<h2><?php echo $detail_name; ?></h2>
								<p>Posted Date: <?php echo $detail_date; ?></p>
								<span>
									<span><?php echo $detail_price . " Rs/-"; ?></span>
									<a href="cart.php?add_cart=<?php echo $detail_id; ?>" name="add_cart" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
									<a href="index.php" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Continue shopping
									</a><br><br>

								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Product Description:</b><?php echo $detail_description; ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								<hr>
								<span>
									<span>Shop Details</span>
								</span>
								<p><b>Shop Name: </b><?php echo $shop_name; ?></p>
								<p><b>Shopkeeper Name: </b><?php echo $name; ?></p>
								<p><b>Shopkeeper Email: </b><?php echo $email; ?></p>
								<p><b>Contect: </b><?php echo $contect; ?></p>
								<p><b>Location: </b><?php echo $location; ?></p>
								<span>
									<span>
									<a href="shop_profile.php?shop_id=<?php echo $shop_id; ?>" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Visit Our Profile
									</a>
									</span>
								</span>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
			</div>
		</div>
	</div>
        <?php include_once "footer.php";?>
        <script src="js/jqueryzoom.js"></script>
        <script src="js/jquery.js"></script>
</body>
</html>