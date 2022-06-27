<html>
<head>
    <title>About Us</title>
    <link href="dd/css/bootstrap.min.css" rel="stylesheet">
    <link href="dd/css/font-awesome.min.css" rel="stylesheet">
    <link href="dd/css/prettyPhoto.css" rel="stylesheet">
    <link href="dd/css/price-range.css" rel="stylesheet">
    <link href="dd/css/animate.css" rel="stylesheet">
    <link href="dd/css/main.css" rel="stylesheet">
    <link href="dd/css/responsive.css" rel="stylesheet">
    <link href="biulded_files/font%20awesome/css/all.min.css">
</head>
<body>
<?php include_once "include/top_header.php";?>
<?php include_once "head.php";?>
<?php include_once "menu.php";?>

<div class="container">
    <h2 class="title text-center">About Us</h2>
    <div class="col-md-9"><!--Blog Body Start-->
        <div class="blog-post-area"><!--Blog-post-area start-->
            <div class="single-blog-post"><!--Single Blog start-->
                <h2 class="title text-center">Our Team</h2>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="">
                                <img src="image/slider/dr-inam.png">
                            </a>
                        </div>
                        <div class="col-md-8 text-justify">
                            <div class="post-meta">
                                <h3>Dr. Muhammad Inam-ul-haq (Supervisor)</h3>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>Profession:</b> Assitt. Profesor</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>University:</b> Khushal Khan Khattak University KARAK</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-info-circle"></i>Phd in Image Processing, Computer Vision, Computer Graphics</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-envelope"></i><b>Email:</b>  muhammad.inamulhaq@kkkuk.edu.pk &nbsp; +92-927-291021  </li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-mobile-phone"></i><b>Follow Us</b> </li>
                                    <img src="image/facebook.png" width="20px"> &nbsp;
                                    <img src="image/instagram.png" width="20px"> &nbsp;
                                    <img src="image/twitter.png" width="20px"> &nbsp;
                                    <img src="image/gmail.png" width="20px"> &nbsp;
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <a href="">
                                <img src="image/slider/mud.png">
                            </a>
                        </div>
                        <div class="col-md-8 text-justify">
                            <div class="post-meta">
                                <h3>Mudassir Ahmed Khattak</h3>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>Profession:</b> Web Designer and Devolper</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>Status:</b> Student</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>University:</b> Khushal Khan Khattak University KARAK</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-envelope"></i><b>Email:</b> mudassirahmed88@gmail.com &nbsp; +923489897145  </li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-mobile-phone"></i><b>Follow Us</b> </li>
                                    <img src="image/facebook.png" width="20px"> &nbsp;
                                    <img src="image/instagram.png" width="20px"> &nbsp;
                                    <img src="image/twitter.png" width="20px"> &nbsp;
                                    <img src="image/gmail.png" width="20px"> &nbsp;
                                </ul>
                            </div>
                        </div>
                    </div> <!--Row Ended-->

                    <div class="row">
                        <div class="col-md-4">
                            <a href="">
                                <img src="image/slider/4.jpg" height="250px;">
                            </a>
                        </div>
                        <div class="col-md-8 text-justify">
                            <div class="post-meta">
                                <h3>Nadeem Ullah</h3>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>Profession:</b> Web Team Member</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>Status:</b> Student</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><b>University:</b> Khushal Khan Khattak University KARAK</li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-envelope"></i><b>Email:</b> nadeemkhan@@gmail.com &nbsp; +923179642084  </li>
                                </ul> <br><br>
                                <ul>
                                    <li><i class="fa fa-mobile-phone"></i><b>Follow Us</b> </li>
                                    <img src="image/facebook.png" width="20px"> &nbsp;
                                    <img src="image/instagram.png" width="20px"> &nbsp;
                                    <img src="image/twitter.png" width="20px"> &nbsp;
                                    <img src="image/gmail.png" width="20px"> &nbsp;
                                </ul>
                            </div>
                        </div>
                    </div> <!--Row Ended-->
                </div>
            </div><!--Single Blog End-->
        </div>
    </div>

    <div class="col-md-3">
        <div class="blog-post-area">
            <div class="">
                <div class="single-blog-post">
                    <h2 class="title text-center">Latest Post</h2>
                </div>
                <?php
                $recent= "select * from blog";
                $run= mysqli_query($con,$recent);
                while ($row= mysqli_fetch_array($run))
                {
                    $d_id= $row['id'];
                    $name= $row['title'];
                    ?>
                    <ul>
                        <li><a href="blog_detail.php?blog=<?php echo $d_id?>"><?php echo $name;?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
        <?php include_once "footer.php";?>
</body>
</html>