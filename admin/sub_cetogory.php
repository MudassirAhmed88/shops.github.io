<?php
session_start();
include('../dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Sub Cetogories</title>
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
                            <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard / Sub Catogory
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
								<b>/Add Sub Cetagories</b></small></div>
							</div>
						</div>
						<div class="panel-body">
							<form action="sub_cetogory.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
								<label for="title" class="col-md-2 control-label">Select Cetogory:</label>
								<div class="col-md-8">
									<select name="cetagory" class="form-control">
										<option>--Select Cetagory--</option>
										<!--/////View Cetogory From db////-->
										<?php
											$getcat_qry="select * from cetogories";
											$getcat_result=mysqli_query($con, $getcat_qry);

											$sno= 1;
											while($row= mysqli_fetch_array($getcat_result))
											{
												$cat_id= $row['cetogory_id'];
												$cat_list= $row['cetagory_title'];
												echo "<option value='$cat_id'>$cat_list</option>";				
											}
										?>
									</select>
								</div>
								</div><br><br><br>
								
								<div class="form-group">
									<label for="title" class="col-md-2 control-label">Sub Cetagory:</label>
									<div class="col-md-10">
										<input type="text" placeholder="Cetogory Name e.g Shoes, Clothes, Sports etc" class="form-control" name="sub_cetagory">
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
                    <table class="table table-striped table-condensed">
                        <tr>
                            <th>S/NO:</th>
                            <th>Cetagory Name:</th>
                            <th>Sub Cetagory:</th>
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
                                <?php
                                $qry= "select * from  sub_cetogories where cat_id='$catagory_id'";
                                $run= mysqli_query($con, $qry);
                                while($row= mysqli_fetch_array($run))
                                {
                                    $sub_name= $row['sub_cat_name'];
                                    echo "<ul><li>$sub_name</li></ul>";
                                }
                                ?>
                            </td>
                            <td>
                                <a style="color: red;" href="delete_cetogory.php?del=<?php echo $catagory_id;?>"><i class="glyphicon glyphicon-remove"></i></a> &nbsp;
                                <a href="delete_cetogory.php?edit=<?php echo $catagory_id;?>"><i class="glyphicon glyphicon-pencil"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                    </table>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$cat= $_POST['cetagory'];
		$sub_cat= $_POST['sub_cetagory'];
		if($cat == '' OR $sub_cat == '')
		{	
			echo "<script>alert('Plz Enter Cetogory Name');</script>";
			exit();
		}
		else
		{
			$sub_cetogory_qry="INSERT INTO `sub_cetogories`(`cat_id`, `sub_cat_name`) VALUES ('$cat','$sub_cat')";
			$cetogory_result = mysqli_query($con, $sub_cetogory_qry);
			if($cetogory_result)
			{
				echo "<script>alert('Sub Cetagories Inserted');</script>";
				?>
				<script>window.open('sub_cetogory.php','_self');</script>
				<?php
			}
		}

	}
?>