<?php
include_once "dbconn.php";
$get_id= @$_GET['blog'];
?>
<html>
<head>
    <title>Blog</title>
    <link href="dd/css/bootstrap.min.css" rel="stylesheet">
    <link href="dd/css/font-awesome.min.css" rel="stylesheet">
    <link href="dd/css/prettyPhoto.css" rel="stylesheet">
    <link href="dd/css/price-range.css" rel="stylesheet">
    <link href="dd/css/animate.css" rel="stylesheet">
    <link href="dd/css/main.css" rel="stylesheet">
    <link href="dd/css/responsive.css" rel="stylesheet">
</head>
<body>
<div>
    <?php include('include/top_header.php');?>
</div>
<div class="container">
    <div class="col-md-12">
        <div>
            <?php include('head.php'); ?>
        </div>
        <div>
            <?php include_once "menu.php";?>
        </div>
    </div>
    <div class="col-md-9">
        <div class="blog-post-area">
            <div class="single-blog-post">
                <h2 class="title text-center">Details</h2>
                <!--/////Bolg/////-->
                <?php
                $qry= "select * from blog where id='$get_id'";
                $run= mysqli_query($con, $qry);
                while ($row=mysqli_fetch_array($run)) {
                    $id= $row['id'];
                    $image = $row['image'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $date = $row['date'];
                    $description = $row['description'];

                    ?>
                    <h3><?php echo $title;?></h3>
                    <div class="post-meta">
                        <ul>
                            <li><i class="fa fa-calendar"></i> <?php echo $date;?></li>
                        </ul>
                        <ul>
                            <li><i class="fa fa-calendar"></i> Posted By: <?php echo $author; ?></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div align="center" class="col-md-12 row">
                                <a href="">
                                    <img src="admin/image/blog/<?php echo $image;?>" alt="" height="400px;">
                                </a>
                            </div>
                            <div class="col-md-12 text-justify">
                                <p><?php echo $description;?></p>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="blog-post-area">
            <div class="">
                <div class="single-blog-post">
                    <h2 class="title text-center">Latest Post</h2>
                </div>
                <?php
                $recent= "select * from blog order by ASC LIMIT 0,5";
                $run= mysqli_query($con,$qry);
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
</div>
<?php include('footer.php'); ?>
</body>
</html>