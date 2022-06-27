<html>
<head>
<title></title>
<link rel="stylesheet" href="biulded_files/font awesome/css/all.min.css">
<link rel="stylesheet" href="biulded_files/bootstrap/css/bootstrap.min.css">
<script src="biulded_files/bootstrap/js/bootstrap.min.js"></script>
<script src="biulded_files/bootstrap/js/jqry.js"></script>
</head>
<body>
	<footer class=""><!--Footer-->
	<div class="footer-top">
		<div class="container">
		</div>
	</div>

	<div class="footer-widget">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Service</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="contect_us.php">Online Help</a></li>
							<li><a href="contect_us.php">Contact Us</a></li>
							<li><a href="#">Order Status</a></li>
                            <li><a href="shop_detail.php">Shops</a></li>
							<li><a href="about_us.php">FAQ’s</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Quick Shop</h2>
						<ul class="nav nav-pills nav-stacked">
							<?php
                            include_once "dbconn.php";
                            $qry= "select * from cetogories order by rand() limit 0,5";
                            $run_qry= mysqli_query($con, $qry);
                            while($row= mysqli_fetch_array($run_qry))
                            {
                                $id= $row['cetogory_id'];
                                $title= $row['cetagory_title'];
                                echo  "<li><a href='cat_details.php?cat=$id'>$title</a></li>";
                            }
                            ?>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-widget">
						<h2>Information</h2>
                            <div class="contact-information">
                                <div class="module-body">
                                    <ul class="toggle-footer">
                                        <li class="media">
                                            <div class="pull-left">
                                             <span class="icon fa-stack fa-lg">
                                              <i class="fa fa-circle fa-stack-2x"></i>
                                              <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                            </span>
                                            </div>
                                            <div class="media-body">
                                                <p>Karak, KPK Pakistan</p>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="pull-left">
                                                 <span class="icon fa-stack fa-lg">
                                                  <i class="fa fa-circle fa-stack-2x"></i>
                                                  <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <p>(+92) 3489897145 <br>(+92) 3340994070</p>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="pull-left">
                                                 <span class="icon fa-stack fa-lg">
                                                  <i class="fa fa-circle fa-stack-2x"></i>
                                                  <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <span><a href="#">gul72522@gmail.com</a></span>
                                            </div>
                                        </li>

                                    </ul>
                                </div><!-- /.module-body -->
                            </div><!-- /.contact-timing -->
						</ul>
					</div>
				</div>
				<div class="col-sm-3 col-sm-offset-1">
					<div class="single-widget">
						<h2>About Shopper</h2>
						<form action="#" class="searchform">
							<input type="text" placeholder="Your email address" />
							<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							<p>Get the most recent updates from <br />our site and be updated your self...</p>
						</form>
					</div>
                    <div class="row">
                        <div>
                            <div class="companyinfo">
                                <h2><span>ONLINE</span>-SHOP</h2>
                                <p>Thank u for Visiting ONLINESHOP</p>
                            </div>
                        </div>
                    </div>
				</div>

			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="pull-left">Copyright © 2020 ONLINESHOP All rights reserved.</p>
				<p class="pull-right">Designed by <span><a target="_blank" href="">Mudassir Khattak</a></span></p>
			</div>
		</div>
	</div>

</footer><!--/Footer-->
</body>
</html>