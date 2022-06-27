
<form method="post" action="">
	<div align="center" style="margin-top: 15%;">
		<div>
			<input type="submit" name="delete" value="Delete Account" class="btn btn-danger">
		</div>
	</div>
</form>


<?php

include('include/dbconn.php');

if(isset($_POST['delete']))
{
	$customer_email= $_SESSION['customer_email'];
	$id= $_GET['delete_account'];
	
	$delete_account= "delete from customers where customer_email='$customer_email'";
	$run_delete= mysqli_query($con, $delete_account);
	
	if($run_delete)
	{
		session_destroy();
		?>
		<script>
			alert('Account Deleted Succsfully, Good Bye');
			window.open('../index.php', '_self');
		</script>
		<?php
	}
}

?>