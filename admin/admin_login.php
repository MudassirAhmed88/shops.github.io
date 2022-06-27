<?php
session_start();
include_once "../dbconn.php";
?>
<html>
<head>
    <title>Admin Login</title>
    <link href="../dd/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dd/css/font-awesome.min.css" rel="stylesheet">
    <link href="../dd/css/prettyPhoto.css" rel="stylesheet">
    <link href="../dd/css/price-range.css" rel="stylesheet">
    <link href="../dd/css/animate.css" rel="stylesheet">
    <link href="../dd/css/main.css" rel="stylesheet">
    <link href="../dd/css/responsive.css" rel="stylesheet">
</head>
<body>
    <div><br><br><br><br><br><br>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="login-form"><!--login form-->
                <div align="center"><img src="../image/logo/logo.png"></div>
                <h2 class="title text-center">Admin Login</h2>
                <form action="admin_login.php" method="post">
                    <input type="text" name="admin_name" placeholder="UserName" />
                    <input type="password" name="admin_password" placeholder="Password" />
                    <span>
                    <input type="checkbox" class="checkbox">
                    Keep me signed in
                    </span>
                    <button type="submit" name="login" class="btn btn-default btn-block">Login</button>
                </form>
            </div><!--/login form-->
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['login']))
{
    $admin_name= $_POST['admin_name'];
    $admin_pass= $_POST['admin_password'];

    $qry= "SELECT * FROM `admin` WHERE `admin_name`='$admin_name' AND `admin_password`='$admin_pass'";
    $run = mysqli_query($con, $qry);

    if(mysqli_num_rows($run)>0)
    {
        ?>
        <script>
            window.open('admindashboard.php','_self')
        </script>
        <?php
    }
    else {
        echo "<script>alert('Sorry..!!!!! Email or Password is wrong, try again');</script>";
    }
}
?>