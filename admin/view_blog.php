<?php
session_start();
include('../dbconn.php');

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="font awesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jqry.js"></script>
    <style>
    </style>
</head>

<body>
<div>
    <div class="" >
        <!--Sidebar-->
        <?php include('sidebar.php'); ?>
    </div>

    <div class="col-md-9">
        <!--/////head/////-->
        <div class="head">
            <?php include('head.php'); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard / View Blog
                    </li>
                </ol>
            </div>
        </div>

        <div class="view_blog">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Blog Details</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <th>S/No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Auther</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        $qry="select * from blog";
                                        $run= mysqli_query($con, $qry);
                                        if(mysqli_num_rows($run))
                                        {
                                            $sno=1;
                                            while ($row=mysqli_fetch_array($run))
                                            {
                                                $id= $row['id'];
                                                $image= $row['image'];
                                                $title= $row['title'];
                                                $author= $row['author'];
                                                $date= $row['date'];
                                                $des= $row['description'];
                                        ?>
                                        <td><?php echo $sno++;?></td>
                                        <td><?php echo "<img src='image/blog/$image' height='80' width='80'>";?></td>
                                        <td><?php echo $title;?></td>
                                        <td><?php echo $author;?></td>
                                        <td><?php echo $date;?></td>
                                        <td><?php echo $des;?></td>
                                        <td>
                                            <a href="delete_blog.php?del=<?php echo $id;?>"><i class="glyphicon glyphicon-remove text-danger"></i></a> &nbsp;
                                            <a href="edit_blog.php?edit=<?php echo $id;?>"><i class="glyphicon glyphicon-edit text-info"></i></a>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>