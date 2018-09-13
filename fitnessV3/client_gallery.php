<?php include("includes/header.php"); ?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php



$id = $_SESSION['user_id'];

$photos = Photo::find_my_photos($id);





?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


    <!-- Top Menu Items -->
    <?php include("includes/client_top_nav.php"); ?>


    <!-- /.navbar-collapse -->
</nav>


<section class="main-container">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                    <h1 class="page-header">
                        My Photos:
                        <small>Welcome <?php echo $found_user->Forename; ?> to your photo gallery.</small>
                    </h1>
                    </div>
                    <div class="col-sm-2">
                        <br>
                        <br>
                        <form action="client_upload.php">

                            <input class="btn btn-primary" type="submit" name="upload" value="Upload">

                        </form>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <table class="table table-hover">
                            <thread>
                                <tr>
                                    <th>Photo</th>
                                    <th>File Name</th>
                                    <th>Caption</th>
                                    <th>Size</th>
                                    <th>Date</th>
                                </tr>
                            </thread>
                            <tbody>

                            <?php foreach ($photos as $photo) : ?>

                            <tr>
                                <td><img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt="">
                                    <div class="pictures_link links_style">
                                        <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                        <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td><?php echo $photo->Filename; ?></td>
                                <td><?php echo $photo->Caption; ?></td>
                                <td><?php echo $photo->Size; ?></td>
                                <td><?php echo $photo->Date; ?></td>
                            </tr>

                            <?php endforeach;



                            ?>

                            </tbody>

                        </table>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <?php

                    if (!$photos){

                     ?>
                        <div class="col-sm-8">
                        <h1><small><?php echo $found_user->Forename?>, you do not have any photos.</small>
                       <small> Click on the Upload button to add a photo!.</small></h1> <?php
                    }

                    ?>
                        </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</section>
