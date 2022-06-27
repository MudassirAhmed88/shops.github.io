<?php
include('../dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font awesome/css/all.min.css">
    <script src="js/jqry.js"></script>
    <script src="js/bootstrap.min.js"></script>
<style>
	.menu{
		border-right: 2px solid #006699;
	}
	.menu li a{
		color: whitesmoke;
		transition: 0.5s;
		border-bottom: 1px lightgray solid;
	}
	#menu li a:hover{
		background-color: lightslategray;
		color: aliceblue;
	}
</style>
</head>

<body style="padding-top: 60px;">
<div class="col-md-3">
    <div class="navbar navbar-default" style="height: 80vh; font-size: 16px">
        <ul class="nav">
            <li><a href="admindashboard.php" ><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>

            <li><a href="shop_detail.php"><span class="fa fa-university"></span> Shops</a></li>

            <li><a data-toggle="collapse" href="#new1"><span class="fa fa-list"></span> Cetogories
                    <span class="caret"></span></a>
                <ul class="collapse nav" id="new1">
                    <li><a href="add_cetogory.php?add_products"><div class="col-md-1"></div><span class="glyphicon glyphicon-plus">
							</span> Add Cetogories</a></li>
                    <li><a href="sub_cetogory.php?view_products"><div class="col-md-1"></div><span class="glyphicon glyphicon-eye-open">
							</span> Sub Cetogories</a></li>
                </ul>
            </li>
            <li><a data-toggle="collapse" href="#new"><span class="fa fa-list-ul"></span> Blogs
                    <span class="caret"></span></a>
                <ul class="collapse nav" id="new">
                    <li><a href="post_blog.php"><div class="col-md-1"></div><span class="glyphicon glyphicon-plus">
							</span> Post Blogs</a></li>
                    <li><a href="view_blog.php"><div class="col-md-1"></div><span class="glyphicon glyphicon-eye-open">
							</span> View Blogs</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</body>
</html>