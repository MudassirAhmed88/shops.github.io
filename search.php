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
</head>
<body>
    <?php include('include/top_header.php'); ?>
    <?php include('head.php'); ?>
    <?php include('menu.php'); ?>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="products">
                    <div class="col-md-9">
                        <?php
                        if(isset($_GET['submit'])) {
                            $searh_id = $_GET['search'];
                            $searh_qry = "select * from product where product_title like '%$searh_id%' ";
                            $searh_run = mysqli_query($con, $searh_qry);
                            if(mysqli_num_rows($searh_run) > 0)
                            {
                                while ($row_products = mysqli_fetch_array($searh_run)) {
                                    $pro_id = $row_products['product_id'];
                                    $pro_shop_id = $row_products['shop_id'];
                                    $pro_name = $row_products['product_title'];
                                    $pro_image1 = $row_products['product_image1'];
                                    $pro_date = $row_products['product_date'];
                                    $pro_price = $row_products['product_price'];
                                    $pro_status = $row_products['product_status'];

                                    ?><!--html code start-->
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
                                                    <li><a href="shop_profile.php?shop_id=<?php echo $id; ?>"><i class="fa fa-user"></i>
                                                            <?php
                                                            $get_shop_name="select * from shopkeeper_accounts where shop_id='$pro_shop_id'";
                                                            $run_shop_name= mysqli_query($con, $get_shop_name);
                                                            $row_shop_name= mysqli_fetch_array($run_shop_name);
                                                            $id= $row_shop_name['shop_id'];
                                                            echo $shop_name= $row_shop_name['shop_name']. " Shop";
                                                            ?>
                                                        </a></li>
                                                    <li><a href="product_detail.php?detail=<?php echo $pro_id; ?>"><i class="fa fa-info-circle"></i>Details</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //Html Code end
                                }
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>Product Not Available</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once "footer.php";?>
</body>
</html>
