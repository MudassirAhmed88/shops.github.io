<?php
session_start();
include('../dbconn.php');

	$delete_cat= @$_GET['del'];
	
	$delete_qry= "DELETE FROM `cetogories` WHERE cetogory_id='$delete_cat'";
	$delete_run= mysqli_query($con, $delete_qry);
	if($delete_run)
	{
		?>
		<script>
			window.open('add_cetogory.php','_self');
		</script>
		<?php
	}

?>