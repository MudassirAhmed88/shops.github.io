<?php
    include('dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SideBar </title>
<link rel="stylesheet" href="../biulded_files/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../biulded_files/font awesome/css/all.min.css">
<script src="../biulded_files/bootstrap/js/bootstrap.min.js"></script>
<script src="../biulded_files/bootstrap/js/jqry.js"></script>
<style>
	li:hover{
		color: orange;
	}
</style>
</head>

<body>
    <div>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                <h2 class="title text-center">Cetogories</h2>
                    <span class='badge pull-right' style='background-color: darkorange'>Products<br> Available</span><br><br>
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                            <?php
                            $cat= "select * from cetogories";
                            $cat_run= mysqli_query($con, $cat);

                            while ($cat_row= mysqli_fetch_array($cat_run))
                            {
                                $cat_id= $cat_row['cetogory_id'];
                                $cat_name= $cat_row['cetagory_title'];
                                $total_pro= "select * from product where cetagory_id='$cat_id'";
                                $run_pro= mysqli_query($con,$total_pro);
                                $row_pro= mysqli_num_rows($run_pro);
                                echo "<li style='padding: 10px;'><a href='cat_details.php?cat=$cat_id'>$cat_name</a><span class='badge pull-right' style='background-color: darkorange'>$row_pro</span></li>";
                            }
                            ?>
                        </a>
                    </h4>
                </div>
            </div>
    </div>
    <h2 class="title text-center">Latest Products</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?php
                    $viewproduct_qry="select * from product order by 1 DESC LIMIT 0,13";
                    $viewproduct_result=mysqli_query($con, $viewproduct_qry);

                    while($row_products= mysqli_fetch_array($viewproduct_result))
                    {
                        $pro_id= $row_products['product_id'];
                        $pro_name= $row_products['product_title'];
                        $pro_image1= $row_products['product_image1'];
                        $price= $row_products['product_price'];

                        ?>
                        <div class="row">
                            <a href="">
                                <li style="padding: 10px;">
                                    <a href="product_detail.php?detail=<?php echo $pro_id; ?>"><img src="shopkeeper_accounts/image/product_image/<?php echo $pro_image1 ?>" height="40" width="50"></td>
                                    <?php echo $pro_name; ?></a><br>
                                </li>
                            </a>
                        </div>
                        <?php
                    }
                ?>
                </h4>
            </div>
        </div>
    </div><!--/category-products-->
</div>
</div>
</body>
</html>