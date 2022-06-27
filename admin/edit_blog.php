<?php
session_start();
include('../dbconn.php');
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

        <script type="text/javascript" src="css/alert/sweetalert.min.js"></script>
        <script type="text/javascript" src="css/alert/jquery.min.js"></script>
        <script>
            function popup()
            {
                swal('Good','Updated Post','success');
            }
        </script>
    </head>
    <body>
    <div>
        <?php include_once "sidebar.php";?>
    </div>
    <div class="col-md-9">
        <?php include_once "head.php";?>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard / Edit Blog
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <span>Admin / Post Blog</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Write New Blog</div>
                        </div>
                        <div class="panel-body">
                            <?php
                            $get_id= @$_GET['edit'];
                            $get_qry= "select * from blog where id='$get_id'";
                            $get_run= mysqli_query($con, $get_qry);
                            while ($row= mysqli_fetch_array($get_run)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $author = $row['author'];
                                $image = $row['image'];
                                $date = $row['date'];
                                $des = $row['description'];
                            }
                            ?>
                            <form action="edit_blog.php?form=<?php echo $get_id;?>" method="post" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="file" class="col-md-3 control-label">Choose Images *:</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" autocomplete="off" required multiple>
                                        <?php echo "<img src='image/blog/$image' width='80' height='80'>";?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title" class="col-md-3 control-label">Title *:</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo $title;?>" name="title" autocomplete="off" required class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title" class="col-md-3 control-label">Published By *:</label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo $author;?>" name="author" autocomplete="off" required class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="published date" class="col-md-3 control-label">Published Date *:</label>
                                    <div class="col-md-9">
                                        <input type="date" value="<?php echo $date;?>" name="date" autocomplete="off" required  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Description" class="col-md-3 control-label">Description *:</label>
                                    <div class="col-md-9">
									<textarea rows="5" name="description" autocomplete="off" required class="form-control ckeditor">
                                        <?php echo $des;?>
									</textarea>
                                        <script src="ckeditor/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace('description');
                                        </script>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $update_id= $_GET['form'];

    $u_title= $_POST['title'];
    $u_auther= $_POST['author'];
    $u_date= $_POST['date'];
    $u_des= $_POST['description'];

    $u_image= $_FILES['image']['name'];
    $u_tmp_image= $_FILES['image']['tmp_name'];
    move_uploaded_file($u_tmp_image, "image/blog/$u_image");

    $u_qry= "UPDATE `blog` SET `image`=$u_image, `title`=$u_title, `author`=$u_auther,`date`=$u_date,`description`=$u_des WHERE id='$update_id'";
    $u_run= mysqli_query($con, $u_qry);

    if($u_run)
    {
        echo "<script>aler('Updated');</script>";
    }
}
?>