<?php
include_once "dbconn.php";

if(isset($_GET["page"]))
{
    $page=$_GET["page"];
}
else
{
    $page=1;
}
$num_per_page= 05;
$start_from=($page-1)*05;

$qry= "select * from blog limit $start_from,$num_per_page";
$run= mysqli_query($con, $qry);
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

        <div class="col-md-9"><!--Blog Body Start-->
            <div class="blog-post-area"><!--Blog-post-area start-->
                <div class="single-blog-post"><!--Single Blog start-->
                    <h2 class="title text-center">Blogs</h2>
                    <!--/////Bolg/////-->
                    <?php
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
                           <div class="col-md-4">
                               <a href="">
                                   <img src="admin/image/blog/<?php echo $image;?>" alt="" height="180px;">
                               </a>
                           </div>
                           <div class="col-md-8 text-justify">
                               <p><?php echo $description;?></p>
                               <a  class="btn btn-primary" href="blog_detail.php?blog=<?php echo $id?>">Read More</a>
                           </div>
                       </div>
                   </div>
                    <?php }?>
                </div><!--Single Blog End-->
                <?php


                $sql="select * from blog";
                $rs_result=mysqli_query($con, $sql);
                $total_records=mysqli_num_rows($rs_result);
                $total_pages=ceil($total_records/$num_per_page);

                if($page>1)
                {
                    echo "<a href='blog.php?page=".($page-1)."' style='border: 1px solid white' class='btn btn-primary'>Previous </a>";
                }
                for($i=1;$i<=$total_pages;$i++)
                {
                    echo "<a href='blog.php?page=".$i."' style='border: 1px solid white' class='btn btn-primary'>".$i."</a>" ;
                }
                if($i>$page)
                {
                    echo "<a href='blog.php?page=".($page+1)."' style='border: 1px solid white' class='btn btn-primary'> &nbsp;Next</a>";
                }

                ?>
            </div><!--Blog-post-area End-->
        </div><!--Blog Body End col-md-9-->

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

    </div>
<?php include_once "footer.php";?>
</body>
</html>