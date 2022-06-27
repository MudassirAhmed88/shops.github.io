<?php
session_start();
include('../dbconn.php');
$get_id= $_GET['shop'];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Shops Details</title>
    <link rel="stylesheet" href="font awesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jqry.js"></script>
    <style>
    </style>
</head>
<body>
<div class="" >
    <?php include('sidebar.php'); ?>
</div>

<div class="col-md-9">
    <div class="head">
        <?php include('head.php'); ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard / Shop / Shop Details
                </li>
            </ol>
        </div>
    </div>

    <div class="">
        <div class="col-md-12">
            <div class="row">
                <!--Shop Deatils-->
                <div class="shop_details">
                    <?php
                    //Fectch Shop ID
                    $qry= "select * from shopkeeper_accounts where shop_id='$get_id'";
                    $run= mysqli_query($con, $qry);
                    error_reporting(0);
                    while($row= mysqli_fetch_array($run))
                    {
                    $shop_id= $row['shop_id'];
                    $shop_image= $row['shop_image'];
                    $shop_name= $row['shop_name'];
                    $shop_location= $row['shop_location'];
                    $shopkpr_name= $row['shopkeeper_name'];
                    $shopkpr_email= $row['shopkeeper_email'];
                    $shopkpr_contect= $row['shopkeeper_contact'];
                    $shopkpr_city= $row['shopkeeper_city'];

                    ?>
                    <div class="blog-post-area col-md-12">
                        <div class="col-md-4">
                            <div class="single-blog-post">
                                <h3><?php echo $shop_name. " Shop";?></h3>
                                <a>
                                    <img src="../shopkeeper_accounts/image/<?php echo  $shop_image;?>" height="200" width="200" class="img-circle" alt="">
                                </a>
                                <p class="text-justify">
                                <p><b>Shop Name:</b> <?php echo $shop_name. "Shop";?></p>
                                <p><b>Shopkeeper name:</b> <?php echo $shopkpr_name;?></p>
                                <p><b>Shopkeeper email:</b> <?php echo $shopkpr_email; ?></p>
                                <p><b>Shopkeeper contact:</b> <?php echo $shopkpr_contect; ?></p>
                                <p><b>city:</b> <?php echo $shopkpr_city; ?></p>
                                <p><b>Shop location:</b> <?php echo $shop_location;?></p>
                                </p>
                            </div>
                        </div>

                                <div class="col-md-8">
                                <h2 class="title text-center">Our Product Details</h2>
                                <?php
                                $viewproduct_qry="select * from product where shop_id='$get_id'";
                                $viewproduct_result=mysqli_query($con, $viewproduct_qry);
                                $run= mysqli_num_rows($viewproduct_result);
                                if($run == 0)
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                        <p>You Have No Data Yet</p>
                                    </div>
                                    <?php
                                    exit();
                                }
                                else{
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
                                        <div class="col-md-3" style="border: 0.1px solid #f1f1f1;">
                                            <div class="panel">
                                                <div class="panel-heading clearfix" style="border-bottom: 1px solid lightgray">
                                                    <div class="pull-left">
                                                        <?php echo $pro_name; ?>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <img src="../shopkeeper_accounts/image/product_image/<?php echo "$pro_image1"; ?>" width="100%;" height="100px;">
                                                </div>
                                                <div class="panel-footer">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pull-left"><a href="../product_detail.php?detail=<?php echo $pro_id?>" style="color: seagreen"><i class="fa fa-info-circle"></i> Details</a></div>
                                                            <div class="pull-right"><?php echo  "<b>$pro_price/-</b>"; ?></div> <br><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }}?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>