<?php
session_start();
include('dbconn.php');
$page= @$_GET['page'];
if($page==0 || $page==1)
{
    $page1=0;
}
else
{
    $page1= ($page*5)-5;
}
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
	.products a{
		font-size: 12px;
	}
</style>
</head>

<body>
	<div class="">
		<?php include('include/top_header.php'); ?>
		<div class="header">
			<?php include('head.php'); ?>
		</div>
		
		<!--Menu-->
		<div class="menu">
			<?php include('menu.php'); ?>
		</div>
		
		<!--body-->
		<div class="container">
			<div class="col-md-12">
				<!--////Slider////-->
				<?php include('image_slider.php'); ?>
				<div class="row">
					<div class="products">
                        <div class="col-md-3">
                            <?php include('sidebar.php'); ?>
                        </div>

                        <div class="col-md-9">
						<?php
						$viewproduct_qry="select * from product order by rand() limit $page1,9";
						$viewproduct_result=mysqli_query($con, $viewproduct_qry);
						$number_of_result= mysqli_num_rows($viewproduct_result);

						while($row_products= mysqli_fetch_array($viewproduct_result))
						{
							$pro_id= $row_products['product_id'];
							$pro_shop_id= $row_products['shop_id'];
							$pro_name= $row_products['product_title'];
							$pro_image1= $row_products['product_image1'];
							$pro_date= $row_products['product_date'];
							$pro_price= $row_products['product_price'];
							$pro_status= $row_products['product_status'];
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="shopkeeper_accounts/image/product_image/<?php echo $pro_image1; ?>" height="300px" width="100px" alt="" />
										<h2><?php echo "Rs ".$pro_price. "/-"; ?></h2>
										<p><?php echo $pro_name; ?></p>
										<a href="index.php?add_cart=<?php echo $pro_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo "Rs ". $pro_price. "/-"; ?></h2>
											<p><?php echo $pro_name; ?></p>
											<a href="index.php?add_cart=<?php echo $pro_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
                                        <?php
                                        $get_shop_name="select * from shopkeeper_accounts where shop_id='$pro_shop_id'";
                                        $run_shop_name= mysqli_query($con, $get_shop_name);
                                        $row_shop_name= mysqli_fetch_array($run_shop_name);
                                        $id= $row_shop_name['shop_id'];
                                        $shop_name= $row_shop_name['shop_name']. " Shop";
                                        ?>
										<li><a href="shop_profile.php?shop_id=<?php echo $id; ?>"><i class="fa fa-user"></i><?php echo $shop_name;?></a></li>
										<li><a href="product_detail.php?detail=<?php echo $pro_id; ?>"><i class="fa fa-info-circle"></i>Details</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
                        <!--////Pagination////-->
                       <div class="text-center">
                           <?php
                           $pagesql= "select * from product";
                           $pageres= mysqli_query($con, $pagesql);
                           $count= mysqli_num_rows($pageres);

                           $a= ceil($count/9);

                           for ($b=1; $b<=$a; $b++)
                           {
                               ?>
                               <a href="index.php?page=<?php echo $b;?>" class="btn btn-primary"><?php echo $b;?></a>
                               <?php

                           }
                           ?>
                       </div>
				    </div>
				</div>
			</div>
        </div>
	</div>




        <!--////Footer//////-->
	    <div>
           <?php include_once "footer.php";?>
       </div>
</body>
</html>