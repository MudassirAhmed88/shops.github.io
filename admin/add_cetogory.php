<?php
include('../dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Cetogories</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font awesome/css/all.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jqry.js"></script>
</head>

<body>
	<div>
		<div class="" >
			<!--Sidebar-->
			<?php include('sidebar.php'); ?>
		</div>
		
		<div class="col-md-9">
			<!--/////head/////-->
			<div class="head">
				<?php include('head.php'); ?>
			</div>

            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard / Add Cetogory
                        </li>
                    </ol>
                </div>
            </div>
			
			<div class="col-md-12">
				<!--///////Add New Cetogories/////-->
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-8"><b>Add New Cetagories</b></div>
								<div class="col-md-4" style="color: lightgray"><small class="fa fa-question-circle">
								<b>/Add New Cetagories</b></small></div>
							</div>
						</div>
						<div class="panel-body">
							<form action="add_cetogory.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="title" class="col-md-2 control-label">Cetogory Name:</label>
									<div class="col-md-8">
										<input type="text" placeholder="Cetogory Name e.g Shoes, Clothes, Sports etc" class="form-control" name="Cetogory_name">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										<input type="submit" name="submit" class="btn btn-primary" value="Add Cetogory">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<!--/////View Cetogory///////-->
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading"><b>Cetagories</b></div>
						<div class="panel-body">
							<table class="table table-striped table-condensed">
							<tr>
								<th>S/NO:</th>
								<th>Cetagory Name:</th>
								<th>Action:</th>
							</tr>
							<tr>
								<?php

									$viewcat_qry="select * from cetogories order by 1 DESC";
									$viewcat_result=mysqli_query($con, $viewcat_qry);

									$sno= 1;
									while($row= mysqli_fetch_array($viewcat_result))
									{
										$catagory_id= $row['cetogory_id'];
										$catagory_title= $row['cetagory_title'];
								?>
								<td><?php echo $sno++;?></td>
								<td><?php echo $catagory_title;?></td>
								<td>
									<a href="delete_cetogory.php?del=<?php echo $catagory_id;?>"><i class="btn btn-danger btn-sm glyphicon glyphicon-remove"></i></a>
								</td>
							</tr>
							<?php }?>
							</table>
						</div>
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
		$add_cetogory= $_POST['Cetogory_name'];
		if($add_cetogory == '')
		{	
			echo "<script>alert('Plz Enter Cetogory Name');</script>";
			exit();
		}
		else
		{
			$cetogory_qry="INSERT INTO `cetogories`(`cetagory_title`) VALUES ('$add_cetogory')";
			$cetogory_result = mysqli_query($con, $cetogory_qry);
			if($cetogory_result)
			{
				echo "<script>alert('Cetagories Inserted');</script>";
				?>
				<script>window.open('add_cetogory.php','_self');</script>
				<?php
			}
		}

	}
?>