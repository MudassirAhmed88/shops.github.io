<?php
session_start();
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
            <div class="col-md-8">
                <div class="row">
                    <!--Shop Deatils-->
                    <div class="shop_details">
                        <h2 class="title text-center">Shops Details</h2>
                        <?php
                        $qry= "select * from shopkeeper_accounts order by rand()";
                        $run= mysqli_query($con, $qry);
                        if(mysqli_num_rows($run) == 0)
                        {
                            ?>
                            <div class="alert alert-danger">
                                <h3>No Shop Registered Yet</h3>
                            </div>
                            <?php
                        }
                        else
                        {
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
                                <div class="blog-post-area">
                                    <div class="single-blog-post col-md-12">
                                        <h3><?php echo $shop_name. " Shop";?></h3>
                                        <div class="post-meta">
                                            <ul>
                                                <li><i class="fa fa-user"></i> Mac Doe</li>
                                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                            </ul>
                                        </div>
                                        <a class="col-md-4">
                                            <img src="shopkeeper_accounts/image/<?php echo  $shop_image;?>" alt="">
                                        </a>
                                        <p class="col-md-8">
                                        <p><b>Shop Name:</b> <?php echo $shop_name. "Shop";?></p>
                                        <p><b>Shop location:</b> <?php echo $shop_location;?></p>
                                        <p><b>Shopkeeper name:</b> <?php echo $shopkpr_name;?></p>
                                        <p><b>Shopkeeper email:</b> <?php echo $shopkpr_email; ?></p>
                                        <p><b>Shopkeeper contact:</b> <?php echo $shopkpr_contect; ?></p>
                                        <p><b>Shopkeeper city:</b> <?php echo $shopkpr_city; ?></p>
                                        </p>
                                        <a  class="btn btn-primary" href="shop_profile.php?shop_id=<?php echo $shop_id ?>">Visit Our Profile</a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?><br>
                        <div class="pagination-area" align="center">
                            <ul class="pagination">
                                <li><a href="" class="active">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="">
                    <h2 class="title text-center">Shops List</h2>
                    <?php
                    $l_qry= "select * from shopkeeper_accounts";
                    $l_run= mysqli_query($con,$l_qry);
                    if(mysqli_num_rows($l_run)>0)
                    {
                        while ($l_row=mysqli_fetch_array($l_run))
                        {
                            $id= $l_row['shop_id'];
                            $name=$l_row['shop_name'];
                            echo "<ul><li class='text-center'><a href='shop_profile.php?shop_id=$id'>$name</a></li></ul>";
                        }
                    }
                    else
                    {
                        echo "<h3 class='text-danger'>Shop Not Register Yet</h3>";
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <!--////Footer//////-->
    <?php include_once "footer.php";?>
</div>
</body>
</html>