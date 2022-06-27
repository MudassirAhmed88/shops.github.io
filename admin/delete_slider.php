<?php
session_start();
	include('../dbconn.php');
	$delete_slider= @$_GET['del'];
	
	$delete_qry= "DELETE FROM `slider` WHERE s_id='$delete_slider'";
	$delete_run= mysqli_query($con, $delete_qry);
	if($delete_run)
	{
		?>
			<html>
				<body>
					<div class="alert alert-danger">
						<a href="?deleted=<?php echo "Slider Deleted..!!"; ?>" class="close" data-dismiss="alert">x</a>
						<script>
							window.open('add_slider.php','_self');
						</script>
					</div>
				</body>
			</html>
		<?php
	}

?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font awesome/css/all.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jqry.js"></script>