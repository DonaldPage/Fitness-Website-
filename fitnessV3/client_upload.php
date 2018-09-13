<?php include("includes/header.php");

header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}
?>

<?php

$found_user = User::find_by_id($_SESSION['user_id']);


if (isset($_POST['submit'])) {

    $photo = new Photo();
    $photo->Caption = $_POST['title'];
    $photo->set_file($_FILES['file_upload']);
    $photo->Alternate_text = $_POST['Alternate_text'];
    $photo->UserID = $_SESSION['user_id'];
    $photo->Date = date('Y-m-d');
    if ($photo->save()) {

        $message = $photo->Filename . " was uploaded successfully.";

    } else {

        $message = join("<br>", $photo->errors);

    }


} else {

    $message = "";

}



?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">


<!-- Top Menu Items -->
<?php include("includes/client_top_nav.php"); ?>





            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


<?php //include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>


<section class="main-container">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <h1 class="page-header">
                            Upload
                            <small>Please choose a file to upload</small>
                        </h1>
                    </div>
                    <div class="col-sm-5"></div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <h4 class="bg-danger"><?php echo $message; ?></h4>

                        <form action="instructor_upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                <label for="title">Caption your photo</label>
                                <input type="text" name="title" class="form-control">

                            </div>
                            <div class="form-group">

                                <label for="alt-text">Add and alternative text about your photo</label>
                                <input type="text" name="Alternate_text" class="form-control">

                            </div>

                            <div class="form-group">

                                <input type="file" name="file_upload">

                            </div>

                            <input type="submit" name="submit">

                        </form>

                    </div>
                    <div class="col-sm-5"></div>
                </div>
            </div>
            <!-- /.row -->

            <p style="text-align:center;">
                <input class="btn btn-primary" id="btn0" type="button" value="Go Back" onclick="goBack()">
            </p>
            <br>
            <br>

            <script>
                function goBack() {
                    window.history.go(-1);
                }
            </script>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</section>
