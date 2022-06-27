<?php
session_start();
include('function.php');
include('dbconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home </title>
<link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
<link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
<script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
<script src="biulded_files/bootstrap/js/jqry.js"></script>

    <link href="dd/css/bootstrap.min.css" rel="stylesheet">
    <link href="dd/css/font-awesome.min.css" rel="stylesheet">
    <link href="dd/css/prettyPhoto.css" rel="stylesheet">
    <link href="dd/css/price-range.css" rel="stylesheet">
    <link href="dd/css/animate.css" rel="stylesheet">
	<link href="dd/css/main.css" rel="stylesheet">
	<link href="dd/css/responsive.css" rel="stylesheet">
<style>
</style>
</head>

<body>
	<div class="">
		<div class="header">
			<?php include('head.php'); ?>
		</div>
		
		<!--Menu-->
		<div class="menu">
			<?php include('menu.php'); ?>
		</div>
		
		<!--body-->
		<div class="body">
			<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<!--<div id="gmap" class=""></div>-->
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
                        <?php
                        $Msg = "";
                        if(isset($_GET['error']))
                        {
                            $Msg = " Please Fill in the Blanks ";
                            echo '<div class="alert alert-danger">'.$Msg.'</div>';
                        }

                        if(isset($_GET['success']))
                        {
                            $Msg = " Your Message Has Been Sent ";
                            echo '<div class="alert alert-success">'.$Msg.'</div>';
                        }

                        ?>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="contect_us.php" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control"  placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>
				            <div class="form-group col-md-12">
				                <input type="submit" name="send" class="btn btn-primary pull-right" value="Send">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>OnlineShop</p>
							<p>Office Location (Still Pending)</p>
							<p>Karak, Pakistan</p>
							<p>Mobile: +923489897145</p>
							<p>Fax: Soon will share with You</p>
							<p>Email: gul72522@gmail.com</p>
	    				</address>
	    				<div class="social-networks text-center">
	    					<h2 class="title text-center">Social Networking</h2>
							<a href="https://www.facebook.com/mudasir.ktk.56/"><img src="image/facebook.png" width="20px"></a> &nbsp;
							<a href="https://www.instagram.com/mudasir.ktk.56/"><img src="image/instagram.png" width="20px"></a> &nbsp;
							<a href="https://www.twitter.com/@gul72522/"><img src="image/twitter.png" width="20px"></a> &nbsp;
							<a href=""><img src="image/pinterest.png" width="20px"></a> &nbsp;
							<a href=""><img src="image/linkedin.png" width="20px"></a> &nbsp;
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
		</div>
		<br>
		<div class="footer">
			<?php include('footer.php'); ?>
		</div>
	</div>
</body>
</html>
<?php

if(isset($_POST['send']))
{
    $UserName = $_POST['name'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Msg = $_POST['message'];

    if($UserName == "" || $Email == "" || $Subject == "" || $Msg == "")
    {
        ?>
        <script>
            window.open('contect_us.php?error','_self');
        </script>
        <?php
    }
    else
    {
        $to = "mudassirahmed88@yahoo.com";

        if(mail($to,$Subject,$Msg,$Email))
        {
            ?>
            <script>
                window.open('contect_us.php?success','_self');
            </script>
            <?php
        }
    }
}

?>