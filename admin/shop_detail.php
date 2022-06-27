<?php
session_start();
include('../dbconn.php');

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
                    <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard / Shop Details
                </li>
            </ol>
        </div>
    </div>

    <div class="shop_details">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Register Shops</div>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>S/NO</th>
                                    <th>Shopkeeper Name</th>
                                    <th>Shop Name</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Details</th>
                                </tr>
                                <tr>
                                    <?php
                                    $shop_qry= "select * from shopkeeper_accounts";
                                    $shop_run= mysqli_query($con, $shop_qry);
                                    if(mysqli_num_rows($shop_run)>0)
                                    {
                                        $s_no=1;
                                        while ($row=mysqli_fetch_array($shop_run))
                                        {
                                            $id= $row['shop_id'];
                                            $shop_name= $row['shop_name'];
                                            $shop_location= $row['shop_location'];
                                            $shop_image= $row['shop_image'];
                                            $shopkpr_name= $row['shopkeeper_name'];
                                            $shopkpr_email= $row['shopkeeper_email'];
                                            $shop_phone= $row['shopkeeper_contact'];


                                    ?>
                                    <td><?php echo $s_no++; ?></td>
                                    <td><?php echo $shopkpr_name;?></td>
                                    <td><?php echo $shop_name;?></td>
                                    <td><?php echo $shop_location;?></td>
                                    <td><?php echo "<img src='../shopkeeper_accounts/image/$shop_image' height='60' width='60'>";?></td>
                                    <td><?php echo $shopkpr_email;?></td>
                                    <td><?php echo $shop_phone;?></td>
                                    <td><a href="shop_profile.php?shop=<?php echo $id;?>" class="btn btn-info btn-sm">Details</a></td>
                                </tr>
                                <?php }}?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
