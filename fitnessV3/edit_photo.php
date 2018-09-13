<?php include("includes/header.php"); ?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php

if(empty($_GET['id'])){

    redirect("client_gallery.php");

} else {

    $photo = Photo::find_by_id($_GET['id']);

    if (isset($_POST['update'])){

        if ($photo){

            //$photo->id = $_POST['id'];
            $photo->Caption = $_POST['caption'];
            //$photo->UserID = $_POST[$_SESSION['user_id']];
            //$photo->filename = $_POST['filename'];
            $photo->Alternate_text = $_POST['alternate_text'];
            $photo->Description = $_POST['description'];
            //$photo->date = $_POST['date'];
            //$photo->type = $_POST['type'];
            //$photo->size = $_POST['size'];


            $photo->save();

        }

    }


}



?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


    <!-- Top Menu Items -->
    <?php include("includes/top_nav.php"); ?>


    <!-- /.navbar-collapse -->
</nav>


<section class="main-container">
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-sm-12">

                    <h1 class="page-header">
                        Edit Photo:
                        <small><?php echo $found_user->Forename; ?>, update your photo information.</small>
                    </h1>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <form action="edit_photo.php" method="post">

                        <div class="col-md-8">

                            <div class="form-group">

                                <a ><img class="admin-photo-thumbnail" src="<?php //echo $photo->picture_path(); ?>" alt=""></a>

                            </div>

                            <div class="form-group">
                                <label for="caption">caption</label>
                                <input type="text" name="caption" class="form-control" value="<?php echo $photo->Caption; ?>">

                            </div>

                            <div class="form-group">
                                <label for="caption">Alternate Text</label>
                                <input type="text" name="alternate_text" class="form-control" value="<?php echo $photo->Alternate_text; ?>">

                            </div>

                            <div class="form-group">
                                <label for="caption">description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $photo->Description; ?>
                        </textarea>
                            </div>

                        </div><!-- end of form-->



                        <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            date Uploaded: <span class="glyphicon glyphicon-calendar"></span> <?php echo $photo->Date; ?>
                                        </p>
                                        <p class="text ">
                                            Photo Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                                        </p>
                                        <p class="text">
                                            filename: <span class="data"><?php echo $photo->Filename; ?></span>
                                        </p>
                                        <p class="text">
                                            File type: <span class="data"><?php echo $photo->Type; ?></span>
                                        </p>
                                        <p class="text">
                                            File size: <span class="data"><?php echo $photo->Size; ?></span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a  href="delete_photo.php?id=" class="btn btn-danger btn-lg ">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>



                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</section>
