<?php include("includes/header.php");

header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}
?>

<?php

$photos = Photo::find_all();

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

                    <table class="table table-hover">
                        <thread>
                            <tr>
                                <th>Photo</th>
                                <th>File Name</th>
                                <th>Caption</th>
                                <th>Size</th>
                            </tr>
                        </thread>
                        <tbody>
                        <tr>
                            <td><img class="adim-photo-thumbnail" src="<?php //echo $photos->picture_path(); ?>" alt="">
                            </td>
                            <td><?php echo $photo->Filename; ?></td>
                            <td><?php echo $photo->Caption; ?></td>
                            <td><?php echo $photo->Size; ?></td>
                        </tr>
                        </tbody>

                    </table>


                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</section>
