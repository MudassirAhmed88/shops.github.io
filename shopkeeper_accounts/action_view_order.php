<?php
include('include/dbconn.php');
session_start();
$order_id= @$_GET['order_view'];
if(isset($_SESSION['shopkeeper_email']))
{
	echo "";
}
else
{
	header('location:shop_login.php');
}

//Take Action ON Order
if(isset($_POST['submit']))
{
    $status=$_POST['status'];
    $remark=$_POST['remark'];

    $sql= "update customer_orders set order_status='$status', remarks='$remark' where order_id='$order_id'";
    $run= mysqli_query($con, $sql);
    if($run)
    {
        echo '<script>alert("Remark has been updated")</script>';
        echo "<script>window.open('dashboard.php','_self')</script>";
    }
}
?>
<!doctype html>
<html lang="">
<head>
<meta charset="utf-8">
<title>ShopKeeper Dashboard</title>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font awesome/css/all.min.css">
<script src="js/jqry.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
	body{
		padding-top: 60px;
	}
</style>
</head>

<body>
	<div>
		<div class="" >
			<!--Sidebar-->
			<?php include('shop_sidebar.php'); ?>
		</div>
		<div class="col-md-9">
			<?php include('shop_head.php'); ?>
			<!--////Body////-->
			
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="glyphicon glyphicon-dashboard"></i> Dashboard / View Order
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                <div class="breadcrumb">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Order Details</div>
                            <div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-responsive table-hover">
                                    <?php
                                    //get costomer details
                                    $qry="select * from customer_orders where order_id='$order_id'";
                                    $run= mysqli_query($con, $qry);
                                    while ($row= mysqli_fetch_array($run)) {
                                        //customer details
                                        $name = $row['customer_name'];
                                        $email = $row['customer_email'];
                                        $contact = $row['customer_contact'];
                                        $address = $row['customer_address'];
                                        $city = $row['city'];
                                        //product details
                                        $product_name = $row['product_name'];
                                        $product_price = $row['due_amount'];
                                        $product_total = $row['total_products'];
                                        $product_size = $row['product_size'];
                                        $order_date = $row['order_date'];


                                    ?>
                                    <tr>
                                        <th colspan="4" class="text-primary">Customer Details</th>
                                    </tr>
                                    <tr>
                                        <th>Customer Name:</th>
                                        <td><?php echo $name;?></td>
                                        <th>Customer Email:</th>
                                        <td><?php echo $email;?></td>
                                    </tr>
                                    <tr>
                                        <th>Customer Contact:</th>
                                        <td><?php echo $contact;?></td>
                                        <th>Customer Address:</th>
                                        <td><?php echo $address;?></td>
                                    </tr>
                                    <tr>
                                        <th>Customer City</th>
                                        <td><?php echo $city;?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-primary">Product Details</th>
                                    </tr>
                                    <tr>
                                        <th>Product Name:</th>
                                        <td><?php echo $product_name;?></td>
                                        <th>Price:</th>
                                        <td><?php echo $product_price. " Rs/-";?></td>
                                    </tr>
                                    <tr>
                                        <th>Quantity:</th>
                                        <td><?php echo $product_total;?></td>
                                        <th>Product Size:</th>
                                        <td><?php echo $product_size;?></td>
                                    </tr>
                                    <tr>
                                        <th>Order Date:</th>
                                        <td><?php echo $order_date;?></td>
                                        <th>Order Status</th>
                                        <td><?php ?></td>
                                    </tr>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <button name="action" class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>
                                            </td>
                                        </tr>
                                    </form>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
            <div>
		</div>
	</div>
                   <!--/////Action Form//////-->
                   <div>
                       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                       <table class="table table-bordered table-hover data-tables">

                                           <form method="post" name="submit">
                                               <tr>
                                                   <th>Remark :</th>
                                                   <td>
                                                       <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                                               </tr>
                                               <tr>
                                                  <th>Status :</th>
                                                  <td>
                                                      <select name="status" class="form-control wd-450" required="true" >
                                                      <option value="Verified" selected="true">Verified</option>
                                                       <option value="Rejected">Rejected</option>
                                                       </select></td>
                                               </tr>
                                       </table>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" name="submit" class="btn btn-primary">Update</button>

                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $action= $_POST['action'];
    $remark= $_POST['remarks'];

    $update= "update set into customer_orders order_status=$action , remarks=$remark where order_id='$order_id'";
    $qry= mysqli_query($con, $update);
    if($qry)
    {
        echo "<script>alert('Its Done');</script>";
    }
}


?>