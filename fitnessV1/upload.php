<?php include("includes/header.php");

header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}
?>

<?php

    $message = "";

    if (isset($_POST['submit'])) {

        $photo = new Photo();
        $photo->Caption = $_POST['title'];
        $photo->set_file($_FILES['file_upload']);


        if ($photo->save()) {

            $message = $photo->Filename . " was uploaded successfully.";

        } else {

            $message = join("<br>", $photo->errors);

        }


    }







?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">


<!-- Top Menu Items -->
<?php include("includes/top_nav.php"); ?>




            


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            

<?php //include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>


    <section class="main-container">
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload
                            <small>Please choose a file to upload</small>
                        </h1>
                    <div class="col-md-6">
                        <h4 class="bg-danger"><?php echo $message . "<br>"; ?></h4>
                        <form action="upload.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            
                            <input type="text" name="title" class="form-control">

                        </div>
                        
                        <div class="form-group">
                            
                            <input type="file" name="file_upload">

                        </div>

                        <input type="submit" name="submit">
                        
                        </form>

                    </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </section>
