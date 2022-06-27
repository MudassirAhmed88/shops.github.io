<?php
include_once "dbconn.php";
$brand_id= @$_GET['brands'];
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a>
                                <?php
                                $sub_qry= "select * from  sub_cetogories where sub_id='$brand_id'";
                                $run_sub_qry= mysqli_query($con, $sub_qry);
                                while ($row=mysqli_fetch_array($run_sub_qry))
                                {
                                    $sub_id= $row['sub_id'];
                                    $sub_menu= $row['sub_cat_name'];
                                    ?>
                                    <ul>
                                        <li><a><?php echo $sub_menu;?></a></li>
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
                $viewproduct_qry="select * from product where sub_cetogory_id= '$brand_id' ";
                $viewproduct_result=mysqli_query($con, $viewproduct_qry);
                if($fetch= mysqli_num_rows($viewproduct_result) == 0)
                {
                    echo "<div class='alert alert-danger'>You have no product in this Brand</div>";
                }

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
                    <div class="col-md-4" style="border: 0.1px solid #f1f1f1;">
                        <div class="panel">
                            <div class="panel-heading clearfix" style="border-bottom: 1px solid lightgray">
                                <div class="pull-left">
                                    <?php echo $pro_name; ?>
                                </div>
                                <div class="pull-right text-uppercase text-muted text" style="padding: 2px; color:white; background-color: orange;">
                                    <?php
                                    $get_shop_name="select * from shopkeeper_accounts where shop_id='$pro_shop_id'";
                                    $run_shop_name= mysqli_query($con, $get_shop_name);
                                    $row_shop_name= mysqli_fetch_array($run_shop_name);
                                    echo $shop_name= $row_shop_name['shop_name'];
                                    ?>
                                </div>
                            </div>
                            <div class="panel-body">
                                <img src="shopkeeper_accounts/image/product_image/<?php echo "$pro_image1"; ?>" width="100%;" height="100px;">
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left col-md-4"><a href="product_detail.php?detail=<?php echo $pro_id?>" style="color: seagreen"><i class="fa fa-info-circle"></i> Detail</a></div>
                                        <div class="center-block col-md-4"><?php echo  "<b>Rs $pro_price/-</b>"; ?></div>
                                        <div class="pull-right"><a href="index.php?add_cart=<?php echo $pro_id; ?>" style="color: darkorange"><i class="fa fa-cart-plus"></i>Cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>

        </div>
    </div>
</div>
</body>
</html>
