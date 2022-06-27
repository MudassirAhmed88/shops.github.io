<?php
include('include/dbconn.php');
if(isset($_SESSION['shopkeeper_email']))
{
    echo "";
}
else
{
    header('location:shop_login.php');
}
$qry= "select * from shopkeeper_accounts where shopkeeper_email='$shopkpr_email'";
$run_qry= mysqli_query($con, $qry);
$row_id=mysqli_fetch_array($run_qry);
$shop_id= $row_id['shop_id'];
?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>View Orders</title>
        <style>
            .action_btn a{
                font-size: 18px;
            }
        </style>
    </head>
    <body>
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="glyphicon glyphicon-dashboard"></i> Dashboard / Verified Orders
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-check-circle"></i> Verified Orders</div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive">
                            <tr>
                                <th>S/No</th>
                                <th>Name</th>
                                <th>Contect</th>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>QTY</th>
                                <th>Amount (Rs)</th>
                                <th>Order Date</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <?php
                                $order_qry="select * from customer_orders where shop_id='$shop_id' AND order_status='Verified' order by order_id desc";
                                $run_order= mysqli_query($con, $order_qry);
                                if(mysqli_num_rows($run_order)==0)
                                {
                                ?>
                            <tr>
                                <td colspan="20" class="text-center text-danger" style="font-size: 16px;"><b>You Have No Verified Orders</b></td>
                            </tr>
                            <?php
                            }
                            else{
                                $s_no=1;
                                while($row_order= mysqli_fetch_array($run_order))
                                {
                                    $order_id=$row_order['order_id'];
                                    $c_name= $row_order['customer_name'];
                                    $c_email= $row_order['customer_email'];
                                    $p_size= $row_order['product_size'];
                                    $c_contact= $row_order['customer_contact'];
                                    $c_address= $row_order['customer_address'];
                                    $c_product= $row_order['product_name'];
                                    $c_amount= $row_order['due_amount'];
                                    $t_product= $row_order['total_products'];
                                    $c_date= $row_order['order_date'];
                                    $city= $row_order['city'];
                                    $remarks= $row_order['order_status'];

                                    ?>
                                    </tr>
                                    <tr>
                                        <td><?php echo $s_no++; ?></td>
                                        <td class="bg-danger"><?php echo $c_name; ?></td>
                                        <td class="bg-warning"><?php echo $c_contact; ?></td>
                                        <td><?php  echo $c_product; ?></td>
                                        <td></td>
                                        <td><?php echo $t_product; ?></td>
                                        <td><?php echo $c_amount . "/-"; ?></td>
                                        <td bgcolor="yellow"><?php echo $c_date; ?></td>
                                        <td><?php echo $city; ?></td>
                                        <td><?php echo $c_address; ?></td>
                                        <td><?php echo $remarks; ?></td>
                                        <td class="action_btn">
                                            <a href="action_view_order.php?order_view=<?php echo $order_id; ?>" class="text-info"><i class="fa fa-eye"></i></a>
                                            <a href="delete_order.php?order_del=<?php echo $order_id; ?>" class="text-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php }}?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php