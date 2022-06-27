<?php
session_start();
include('../dbconn.php');
$edit_id= @$_GET['edit'];

$qry= "select * from writepost where id='$edit_id' ";
$run= mysqli_query($con, $qry);

while($row=mysqli_fetch_array($run)) 
{
	$edit_id= $row['id'];
	$uimage= $row['image'];
	$utitle= $row['title'];
	$uauthor= $row['author'];
	$udate= $row['date'];
	$udescription= $row['description'];

}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Write New Post</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/jqry.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
   <style>

   </style>
    
</head>
<body>
<div>
	<?php include('adminmenu.php'); ?>
</div>
	<div class="">
		<div class="col-md-9">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Record Update Here</h2>
					</div>
					<div class="panel-body">
						<form action="edit.php?edit_form=<?php echo $edit_id; ?>" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="file" class="col-md-3 control-label">Choose Images *:</label>
								<div class="col-md-9">
									<input type="file" name="update_fileimage" required multiple >
									<img src="../image/<?php echo $uimage; ?>" width="100px" height="80">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-3 control-label">Title *:</label>
								<div class="col-md-9">
									<input type="text" name="update_title" value="<?php echo $utitle; ?>" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 control-label">Published By *:</label>
								<div class="col-md-9">
									<input type="text" name="update_author" value="<?php echo $uauthor; ?>" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="published date" class="col-md-3 control-label">Published Date *:</label>
								<div class="col-md-9">
									<input type="date" name="update_date" value="<?php echo $udate; ?>" required  class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="Description" class="col-md-3 control-label">Description *:</label>
								<div class="col-md-9">
									<textarea rows="5" name="update_description" required class="form-control ckeditor">
									<?php echo $udescription;?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3"></label>
								<div class="col-md-9">
									<input type="submit" name="submit" value="Update Record" class="btn btn-success">
								</div>
							</div>
						</form>
					</div>
				</div>
					
		</div>
	</div>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$update_id= $_GET['edit_form'];
	
	$update_filename= $_FILES['update_fileimage']['name'];
	$update_tempname= $_FILES['update_fileimage']['tmp_name'];
	$folder= "../image/".$update_filename;
	move_uploaded_file($update_tempname, $folder);

	$update_title= $_POST['update_title'];
	$update_author_name= $_POST['update_author'];
	$update_issue_date= $_POST['update_date'];
	$update_description= $_POST['update_description'];
	
	$updateqry= "UPDATE writepost SET image='$update_filename', title='$update_title', author='$update_author_name', date='$update_issue_date', description='$update_description' where id='$update_id'  ";
	
	$run= mysqli_query($con, $updateqry);
	if($run)
	{
		?>
		<script>
			alert('Post Updated');
			window.open('viewpost.php','_self');
		</script>
		<?php
	}
}

?>
