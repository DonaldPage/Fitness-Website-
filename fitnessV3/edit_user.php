<?php include("includes/header.php");

header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}
?>


<?php

if (empty($_GET['id'])) {

    redirect('my_clients.php');

}

    $user = User::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {

        if ($user) {

            $user->Username = $_POST['username'];
            $user->Forename = $_POST['forename'];
            $user->Surname = $_POST['surname'];
            $user->Password = $_POST['password'];

            if (empty($_FILES['user_image'])){

               $user->save();

            } else {

                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $user->save();

                redirect("my_clients.php?id={$user->id}");


            }
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
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h1 class="page-header">
                            Edit User:
                            <small><?php echo $found_user->Forename; ?>, update your profile or image.</small>
                        </h1>
                    </div>

                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">

                        <img class="user_image" src="<?php echo $user->image_path() ?>" alt="">
                        <br>
                        <br>

                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-4">

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">

                                <input type="file" name="user_image">

                            </div>

                            <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->Username; ?>">

                            </div>

                            <div class="form-group">
                                <label for="forename">First Name</label>
                                <input type="text" name="forename" class="form-control" value="<?php echo $user->Forename; ?>">

                            </div>

                            <div class="form-group">
                                <label for="surname">Last Name</label>
                                <input type="text" name="surname" class="form-control" value="<?php echo $user->Surname; ?>">

                            </div>

                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->Password; ?>">

                            </div>

                            <div class="form-group">

                                <a class="btn btn-danger" href="../fitnessV2/delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">

                            </div>
                        </div><!-- end of form-->
                        <div class="col-md-3"></div>

                    </form>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">

                <br>
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <input type="button" class="btn btn-primary pull-left" value="Go Back" onclick="goBack()">
                    </div>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</section>

<script>
    function goBack() {
        window.history.go(-1);
    }
</script>