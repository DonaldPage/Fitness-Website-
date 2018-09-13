<?php include("includes/header.php");

header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}
?>


<?php

$found_user = Instructor::find_by_id($_SESSION['user_id']);



?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


    <!-- Top Menu Items -->
    <?php include("includes/instructor_top_nav.php"); ?>


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

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="col-sm-1"></div>

                            <div class="col-sm-10">

                                <h1 class="page-header">
                                    Profile
                                    <small>Welcome <?php echo $found_user->Forename; ?> to your instructors profile page.</small>
                                </h1>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-1"></div>

                            <!-- Profile info -->
                            <div class="col-sm-5">

                                <div  class="photo-info-box">
                                    <div class="info-box-header info-box-header-padding">
                                        <h4 class="page-header">

                                            <?php echo $found_user->Forename . " " . $found_user->Surname; ?>
                                        </h4>
                                    </div>
                                    <div class="inside">
                                        <div class="box-inner">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img class="user_image" src="<?php echo $found_user->image_path() ?>" alt="">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="text">
                                                        Full Name: <span class="data"></span> <?php echo $found_user->Forename . " " . $found_user->Surname; ?>
                                                    </p>
                                                    <p class="text">
                                                        Username: <span class="data"></span> <?php echo $found_user->Username; ?>
                                                    </p>
                                                    <p class="text">
                                                        Location: <span class="data"><?php echo $found_user->Location; ?></span>
                                                    </p>
                                                    <p class="text">
                                                        Location: <span class="data"><?php echo $found_user->SpecialtyOne; ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info-box-footer clearfix">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.Profile info -->






                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</section>
