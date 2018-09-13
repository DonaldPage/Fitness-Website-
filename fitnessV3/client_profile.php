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



?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


    <!-- Top Menu Items -->
    <?php include("includes/client_top_nav.php");

    if (isset($_POST['submit'])) {

        $location = trim($_POST['location']);

    } else {

        $location = " ";

    }
?>
    <!-- /.navbar-collapse -->
</nav>

<section class="main-container">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">

                        <h1 class="page-header">
                            Profile
                            <small>Welcome <?php echo $found_user->Forename; ?> to your profile page.</small>
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
                                                Date of Birth: <span class="data"><?php echo $found_user->DoB; ?></span>
                                            </p>
                                            <p class="text">
                                                Height: <span class="data"><?php echo $found_user->Height; ?></span>
                                            </p>
                                        </div>

                                        <div class="col-sm-6">
                                            <p class="text">
                                                Weight: <span class="data"><?php echo $found_user->Weight; ?></span>
                                            </p>
                                            <p class="text">
                                                BMI: <span class="data"><?php echo $found_user->BMI; ?></span>
                                            </p>
                                            <p class="text">
                                                Goal: <span class="data"><?php echo $found_user->Goal; ?></span>
                                            </p>
                                            <p class="text">
                                                Location: <span class="data"><?php echo $found_user->Location; ?></span>
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



                    <!-- Search for an instructor -->
                    <div class="col-sm-3">
                        <form action="instructor_results.php">
                            <div class="form-group">
                                <label for="username">Search for Instructors</label>

                                <input type="text" class="form-control" name="location" value="<?php echo htmlentities($location); ?>" placeholder="Enter a town">

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Search">
                            </div>
                        </form>
                    </div>
                    <!-- /.Search -->


                    <div class="col-sm-3">

                </div>
            </div>
            <!-- /.row -->





        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</section>
