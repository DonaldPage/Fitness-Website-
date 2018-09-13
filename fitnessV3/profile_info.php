<?php include("includes/header.php"); ?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php

if(empty($_GET['id'])) {

    redirect("my_clients.php");

}

$client = User::find_by_id($_GET['id']);

?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


    <!-- Top Menu Items -->
    <?php include("includes/instructor_top_nav.php"); ?>


    <!-- /.navbar-collapse -->

    <div class="col-sm-12">
    <h4 class="bg-danger"><?php// echo $the_message; ?></h4>
    </div>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-1"></div>
                <div class="col-sm-6">
                    <div  class="photo-info-box">
                        <div class="info-box-header info-box-header-padding">
                            <h4 class="page-header">

                                <?php echo $client->Forename . " " . $client->Surname; ?>
                            </h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <img class="user_image" src="<?php echo $client->image_path() ?>" alt="">
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text">
                                            Full Name: <span class="data"></span> <?php echo $client->Forename . " " . $client->Surname; ?>
                                        </p>
                                        <p class="text">
                                            Username: <span class="data"></span> <?php echo $client->Username; ?>
                                        </p>
                                        <p class="text">
                                            Date of Birth: <span class="data"><?php echo $client->DoB; ?></span>
                                        </p>
                                        <p class="text">
                                            Height: <span class="data"><?php echo $client->Height; ?></span>
                                        </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <p class="text">
                                            Weight: <span class="data"><?php echo $client->Weight; ?></span>
                                        </p>
                                        <p class="text">
                                            BMI: <span class="data"><?php echo $client->BMI; ?></span>
                                        </p>
                                        <p class="text">
                                            Goal: <span class="data"><?php echo $client->Goal; ?></span>
                                        </p>
                                        <p class="text">
                                            Location: <span class="data"><?php echo $client->Location; ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a href="unlink_client.php?id=<?php echo $client->id; ?>" type="submit" name="unlink" class="btn btn-danger btn-lg ">Unlink</a>
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="message" value="Message" class="btn btn-primary btn-lg ">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <!-- col-sm-8 -->
                <div class="col-sm-5"></div>
            </div>
            <!-- col-sm-12 -->
        </div>
        <!-- /.row -->

        <br>
        <br>

        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-1"></div>
                <div class="col-sm-6">
                    <input class="btn btn-primary" type="button" value="My Clients" onclick="goBack()">
            </div>
            </div>
        </div>
        <br>
        <br>

        <script>
            function goBack() {
                window.history.go(-1);
            }
        </script>
    </div>
    <!-- /.container-fluid -->