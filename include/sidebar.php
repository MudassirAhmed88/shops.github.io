<?php include('dbconn.php'); ?>
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
	body{
		background-color: #f1f1f1;
	}
	#sidebar a{
		color: gray;
		border-bottom: 1px solid lightgray;
		transition: .5s;
	}
	#sidebar li a:hover{
		border-left: 2px solid #337ab7;
	}
</style>
</head>

<body>
	<div class="sidebar">
		<ul class="navbar navbar-default nav" id="sidebar" style="height: auto; border-bottom: 2px solid #2B468F">
	<li class="bg-primary" style="padding: 10px;"><span class="fa fa-bars"></span> Cetagories</li>
<?php
	$viewsidebar_qry="select * from cetogories";
	$viewsidebar_result=mysqli_query($con, $viewsidebar_qry);

	$sno= 1;
	while($row= mysqli_fetch_array($viewsidebar_result))
	{
		$cat_id= $row['cetogory_id'];
		$cat_list= $row['cetagory_title'];
		
		echo "<li><a href='index.php?cat=$cat_id;'>$cat_list</a></li>";
	}
?>
	</ul>
	<div class="login_form" >
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Login</h4>
			</div>
			<div class="panel-body">
				<form>
					<div class="form-group">
						<input type="gmail" placeholder="UserName" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" placeholder="password" class="form-control">
					</div>
					<div class="text-right" style="font-size: 12px;">
						<a href="#"><i>forget password</i></a>
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-sm">Login <span class="glyphicon glyphicon-log-in"></span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
</html>