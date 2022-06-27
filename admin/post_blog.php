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
            swal('Good','Insert Post','success');
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
                    <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard / Post Blog
                </li>
            </ol>
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
                        <form action="post_blog.php" method="post" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label for="file" class="col-md-3 control-label">Choose Images *:</label>
                                <div class="col-md-9">
                                    <input type="file" name="fileimage" autocomplete="off" required multiple>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-3 control-label">Title *:</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" autocomplete="off" required class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-3 control-label">Published By *:</label>
                                <div class="col-md-9">
                                    <input type="text" name="author" autocomplete="off" required class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="published date" class="col-md-3 control-label">Published Date *:</label>
                                <div class="col-md-9">
                                    <input type="date" name="date" autocomplete="off" required  class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Description" class="col-md-3 control-label">Description *:</label>
                                <div class="col-md-9">
									<textarea rows="5" name="description" autocomplete="off" required class="form-control ckeditor">

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
                                    <input type="submit" onclick="popup()" name="submit" value="submit" class="btn btn-success">
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
    include('../dbconn.php');

    $filename= $_FILES['fileimage']['name'];
    $tempname= $_FILES['fileimage']['tmp_name'];
    move_uploaded_file($tempname, "image/blog/$filename");

    $title= $_POST['title'];
    $author_name= $_POST['author'];
    $issue_date= $_POST['date'];
    $description= $_POST['description'];

    $qry= "INSERT INTO `blog`(`image`, `title`, `author`, `date`, `description`)  VALUES 
		('$filename', '$title','$author_name','$issue_date', '$description') ";

    $result= mysqli_query($con, $qry);
}
?>