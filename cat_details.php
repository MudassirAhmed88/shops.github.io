<?php
include_once "dbconn.php";
$get_id= @$_GET['cat'];
?>
<!doctype html>
<html>
<head>
    <title>Cetogory</title>
    <link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
    <link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
    <script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
    <script src="biulded_files/bootstrap/js/jqry.js"></script>
</head>
<body>
    <?php include "include/top_header.php";?>
    <?php include "head.php"; ?>
    <?php include "menu.php";?>

    <div class="container">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="panel-group category-products"><!--category-productsr-->
                    <h2 class="title text-center">Brands</h2>
                    <span class='badge pull-right' style='background-color: darkorange; color: white;'>Products<br> Available</span><br><br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a>
                                <?php
                                $sub_qry= "select * from  sub_cetogories where cat_id='$get_id'";
                                $run_sub_qry= mysqli_query($con, $sub_qry);
                                if($fetch= mysqli_num_rows($run_sub_qry) == 0)
                                {
                                    ?>
                                    <div class="alert alert-danger"><i class="fa fa-question-circle"></i>Brands not available yet</div>
                                    <?php
                                }
                                else
                                while ($row=mysqli_fetch_array($run_sub_qry))
                                {
                                    $sub_id= $row['sub_id'];
                                    $sub_menu= $row['sub_cat_name'];

                                    //View No of Products
                                    $total_pro= "select * from product where sub_cetogory_id='$sub_id'";
                                    $run_pro= mysqli_query($con,$total_pro);
                                    $row_pro= mysqli_num_rows($run_pro);
                                    ?>
                                    <ul>
                                        <li><a href="brand.php?brands=<?php echo $sub_id;?>"><?php echo $sub_menu;?></a><span class='badge pull-right' style='background-color: darkorange'><?php echo $row_pro;?></span></li>
                                    </ul>
                                    <?php
                                }
                                ?>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-list"></i>Brands
                            </li>
                        </ol>
                    </div>
                </div>
                <!--////Fetch Products from Databse-->
                <div class="col-md-9">
                    <?php
                    $viewproduct_qry="select * from product where cetagory_id= '$get_id'";
                    $viewproduct_result=mysqli_query($con, $viewproduct_qry);

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
                        <div class="col-md-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="shopkeeper_accounts/image/product_image/<?php echo $pro_image1; ?>" height="200px" width="100px" alt="" />
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
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php include_once "footer.php";?>
</body>
</html>