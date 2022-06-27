<?php 
include('include/dbconn.php');
$session= $_SESSION['shopkeeper_email'];
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
<title>Add Product</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font awesome/css/all.min.css">
    <script src="js/jqry.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script>
        function popup()
        {
            swal('Added','Your Data Added','success');
        }
    </script>
<style>
</style>
</head>

<body>
<div class="add_product">
	<div class="row">
    	<div class="col-md-12">
    		<ol class="breadcrumb">
    			<li class="active">
    				<i class="glyphicon glyphicon-dashboard"></i> Dashboard / Add Products
    			</li>
    		</ol>
   		</div>
    </div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title"><i class="fa fa-plus"></i> Add Products</div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="add_product.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="title" class="col-md-2 control-label">Product Name</label>
									<div class="col-md-8">
										<input type="text" placeholder="Product Name" class="form-control" name="product_name">
									</div>
							</div>

							<div class="form-group">
								<label for="title" class="col-md-2 control-label">Shop Name:</label>
									<div class="col-md-4">
										<select name="shop_id" class="form-control">
											<?php
											$get_shop= "select * from shopkeeper_accounts where shopkeeper_email='$session'";
											$run_shop= mysqli_query($con, $get_shop);
											$row_shop= mysqli_fetch_array($run_shop);

											$get_shop_id= $row_shop['shop_id'];
											$get_shop_name= $row_shop['shop_name'];

											echo "<option value='$get_shop_id'>$get_shop_name</option>";
											?>
										</select>
									</div>
							</div>

							<div class="form-group">
								<label for="image" class="col-md-2 control-label">Product Image 1:</label>
									<div class="col-md-8">
										<input type="file" name="product_image1">
									</div>
							</div>
							<div class="form-group">
								<label for="image" class="col-md-2 control-label">Product Image 2:</label>
									<div class="col-md-8">
										<input type="file" name="product_image2">
									</div>
							</div>
							<div class="form-group">
								<label for="image" class="col-md-2 control-label">Product Image 3:</label>
									<div class="col-md-8">
										<input type="file" name="product_image3">
									</div>
							</div>

                            <div class="form-group">
                                <label for="price" class="col-md-2 control-label">Available Size:</label>
                                <div class="col-md-8">
                                    38 <input type="checkbox"  name="product_size[]">
                                    39 <input type="checkbox"  name="product_size[]">
                                    40 <input type="checkbox"  name="product_size[]">
                                    41 <input type="checkbox"  name="product_size[]">
                                    42 <input type="checkbox"  name="product_size[]">
                                </div>
                            </div>

							<div class="form-group">
								<label for="price" class="col-md-2 control-label">Product Price</label>
									<div class="col-md-8">
										<input type="text" name="product_price" placeholder="Product Price" class="form-control">
									</div>
							</div>

							<div class="form-group">
								<label for="title" class="col-md-2 control-label">Select Cetogory:</label>
								<div class="col-md-4">
									<select name="product_cat" class="form-control">
										<option>--Select Cetagory--</option>
										<!--/////View Cetogory From db////-->
										<?php
											$get_cat="select * from cetogories";
											$get_result=mysqli_query($con, $get_cat);

											while($row_cat= mysqli_fetch_array($get_result))
											{
												$cat_id= $row_cat['cetogory_id'];
												$cat_list= $row_cat['cetagory_title'];
												echo "<option value='$cat_id'>$cat_list</option>";
											}
										?>
									</select>
								</div>
							</div>

                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label">Select Sub Cetogory:</label>
                                <div class="col-md-4">
                                    <select name="brand_cat" class="form-control">
                                        <option>--Select Sub Cetogory--</option>
                                        <!--/////View Cetogory From db////-->
                                        <?php
                                        $getcat_qry="select * from sub_cetogories";
                                        $getcat_result=mysqli_query($con, $getcat_qry);

                                        while($row_sub= mysqli_fetch_array($getcat_result)) {
                                            $sub_id = $row_sub['sub_id'];
                                            $sub_cat_list = $row_sub['sub_cat_name'];

                                            echo "<option value='$sub_id'>$sub_cat_list</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

							<div class="form-group">
								<label for="password" class="col-md-2 control-label">Product Description:</label>
									<div class="col-md-8">
										<textarea placeholder="Product Description" name="product_description" rows="5" cols="78"></textarea>
									</div>
                                <script src="ckeditor/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace('product_description');
                                </script>
							</div>

							<div class="form-group">
								<label for="keyword" class="col-md-2 control-label">Product Keyword</label>
									<div class="col-md-8">
										<input type="text" name="product_keyword" placeholder="Product KeyWord" class="form-control">
									</div>
							</div>

							<div class="form-group">
								<div class="col-md-offset-2 col-md-10">
									<button class="btn btn-primary" onclick="popup()" name="submit_product"><i class="fa fa fa-lg fa-check-circle"></i> Add Product</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


<?php
if(isset($_POST['submit_product']))
{
	
	$product_name= $_POST['product_name'];
	$shop_id= $_POST['shop_id'];
	$product_price= $_POST['product_price'];
	$product_size= $_POST['product_size'];
	$product_cat= $_POST['product_cat'];
	$brand_cat= $_POST['brand_cat'];
	$product_description= $_POST['product_description'];
	$product_status = 'on';
	$product_keyword= $_POST['product_keyword'];
	
	/*-----Product IMage Name------*/
	$product_image1= $_FILES['product_image1']['name'];
	$temp_name1= $_FILES['product_image1']['tmp_name'];
	move_uploaded_file($temp_name1, "image/product_image/$product_image1");
	
	$product_image2= $_FILES['product_image2']['name'];
	$temp_name2= $_FILES['product_image2']['tmp_name'];
	move_uploaded_file($temp_name2, "image/product_image/$product_image2");
	
	$product_image3= $_FILES['product_image3']['name'];
	$temp_name3= $_FILES['product_image3']['tmp_name'];
	move_uploaded_file($temp_name3, "image/product_image/$product_image3");


		
	$pro_qry="insert into product (`cetagory_id`,`sub_cetogory_id`,`shop_id`, `product_title`, `product_date`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `product_size`, `product_description`,`product_keyword`, `product_status`) value
 ('$product_cat','$brand_cat','$shop_id','$product_name',NOW(),'$product_image1','$product_image2','$product_image3','$product_price','$product_size','$product_description','$product_keyword','$product_status')";

	$pro_run= mysqli_query($con, $pro_qry);
}
?>








