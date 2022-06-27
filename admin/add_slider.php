<?php
session_start();
include('../dbconn.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Slider</title>
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
		
		<div class="col-md-10">
			<!--/////head/////-->
			<div class="head">
				<?php include('head.php'); ?>
			</div>
			
			<!--////Add New Slider////-->
			<div class="add_slider">
				<form class="form-horizontal" action="add_slider.php" method="post" enctype="multipart/form-data">
				<div class="breadcrumb" style="width: 800px; margin: auto;">
					<div class="row bg-primary" style="padding: 10px;">
						<h4 class="pull-left">Add New Slider</h4>
						<span class="fa fa-question-circle pull-right" style="color: lightgrey; padding-top: 10px;"><small><b>/Add New Slider</b></small></span>
					</div>
				</div>
				<br>
					<div class="form-group">
						<label for="image" class="col-md-2 control-label">Image:</label>
							<div class="col-md-8">
								<input type="file" name="slider_image">
							</div>
					</div>
					
					<div class="form-group">
						<label for="title" class="col-md-2 control-label">Title:</label>
							<div class="col-md-8">
								<input type="text" placeholder="Slider Title" class="form-control" name="slider_title">
							</div>
					</div>
					
					<div class="form-group">
						<label for="password" class="col-md-2 control-label">Description:</label>
							<div class="col-md-8">
								<textarea placeholder="Slider Description" name="slider_description" rows="5" cols="99;"></textarea>
							</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<button class="btn btn-primary" name="submit"><i class="fa fa fa-lg fa-check-circle"></i> Add</button>
						</div>
					</div>
			</form>
			</div>
			
			<!--/////View Slider//////-->
			<div class="panel panel-default" style="width: 1000px; margin: auto;">
				<div class="panel-heading">
					<h4>Slider Details</h4>
				</div>
				<div class="panel-body">
					<div class="slider_table">
						<table class="table table-bordered table-striped table-condensed">
							<tr>
								<th>S/NO</th>
								<th>Slider Title</th>
								<th>Slider ID's</th>
								<th>Slider Description</th>
								<th>Slider Image</th>
								<th>Action</th>
								
							</tr>
							<tr>
<?php
								
	$view_qry="select * from slider order by 1 DESC";
	$view_result=mysqli_query($con, $view_qry);

	$sno= 1;
	while($row= mysqli_fetch_array($view_result))
	{
		$sli_id= $row['s_id'];
		$sli_title= $row['s_title'];
		$sli_image= $row['s_image'];
		$sli_description= substr($row['s_description'], 0,100);
?>
								<td><?php echo $sno++; ?></td>
								<td><?php echo $sli_title; ?></td>
								<td><?php echo $sli_id; ?></td>
								<td><?php echo $sli_description; ?></td>
								<td><?php echo "<img src='image/slider/$sli_image' width='50px' height='50px'>"; ?></td>
								<td><a href="delete_slider.php?del=<?php echo $sli_id; ?>"><span class="glyphicon glyphicon-remove btn btn-danger btn-sm"></span></a>
								<a href="edit_slider.php.php?edit=<?php echo $sli_id; ?>"><span class="glyphicon glyphicon-pencil btn btn-success btn-sm"></span></a>
								</td>
							</tr>
	<?php }?>
	
						</table>
					</div>
				</div>	
			</div>
			
			
		</div>
	</div>
</body>
</html>

<!--/////////Inserted Slider To DATABASE/////-->
<?php
if(isset($_POST['submit']))
{
	$slider_image= $_FILES['slider_image']['name'];
	$temp_name= $_FILES['slider_image']['tmp_name'];
	move_uploaded_file($temp_name, "image/slider/$slider_image");
	
	$slider_title= $_POST['slider_title'];
	$slider_description= $_POST['slider_description'];
	
	$qry= "INSERT INTO `slider`(`s_image`, `s_title`, `s_description`) VALUES ('$slider_image','$slider_title','$slider_description')";
	$slider_result= mysqli_query($con, $qry);
	
	if($slider_result)
	{
		?>
		<script>
			alert('Slider Inserted Succsfully');
			window.open('add_slider.php','_self');
		</script>
		<?php
	}
	
}
?>