<?php
include_once "../dbconn.php";
$edit_id= @$_GET['profile'];
$email= $_SESSION['shopkeeper_email'];
if(isset($_SESSION['shopkeeper_email']))
{
    echo "";
}
else
{
    header('location:shop_login.php');
}

$qry= "select * from shopkeeper_accounts where shopkeeper_email='$email'";
$qry_run= mysqli_query($con, $qry);
while ($row=mysqli_fetch_array($qry_run))
{
    $id= $row['shop_id'];
    $s_name= $row['shop_name'];
    $shopkpr_name= $row['shopkeeper_name'];
    $s_email= $row['shopkeeper_email'];
    $s_password= $row['shopkeeper_password'];
    $s_contact= $row['shopkeeper_contact'];
    $s_image= $row['shop_image'];
}
?>

<html>
<head>
    <title>Profile</title>
</head>
<body>
<div class="row">
    <div class="col-md-8">
        <div class="breadcrumb">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-info-circle"></i> Profile</div>
                </div>
                <div class="panel-body">
                    <form method="post" action="profile.php?u_id=<?php echo $edit_id;?>" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-3">Shop Name:</label>
                            <div class="col-md-9">
                                <input type="text" value="<?php echo $s_name?>" name="shop_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Shopkeeper Name:</label>
                            <div class="col-md-9">
                                <input type="text" value="<?php echo $shopkpr_name?>" name="shopkpr_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Gmail:</label>
                            <div class="col-md-9">
                                <input type="text" value="<?php echo $email?>" name="shop_gmail" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Password:</label>
                            <div class="col-md-9">
                                <input type="password" value="<?php echo $s_password?>" name="shop_password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Contact:</label>
                            <div class="col-md-9">
                                <input type="text" value="<?php echo $s_contact?>" name="shop_contact" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Profile Image:</label>
                            <div class="col-md-9">
                                <input type="file" name="profile_image">
                                <img src="image/<?php echo $s_image?>" width="100" height="100">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" name="update">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['update']))
{
    $form_id= $_GET['u_id'];

    $u_shopname= $_POST['shop_name'];
    $u_shopkprname= $_POST['shopkpr_name'];
    $u_gmail= $_POST['shop_gmail'];
    $u_password= $_POST['shop_password'];
    $u_contact= $_POST['shop_contact'];

    $u_image= $_FILES['profile_image']['name'];
    $temp_image= $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($temp_image, "image/$u_image");

    $u_qry= "UPDATE `shopkeeper_accounts` SET shop_name='$u_shopname', shopkeeper_name='$u_shopkprname', shopkeeper_email='$u_gmail', shopkeeper_password='$u_password',shopkeeper_contact='$u_contact', shop_image='$u_image' where shop_id='$form_id'";
    $u_run= mysqli_query($con, $u_qry);
    if($u_run)
    {
        echo "<script>alert('Profile Updated'); window.open('profile.php','_self')</script>";
    }
}


?>