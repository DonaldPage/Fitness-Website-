<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 16/04/2017
 * Time: 07:58
 */


?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Profile</h4>
            </div>

            <!-- Modal-body -->
            <div class="modal-body">

                <h4 class="bg-danger"><?php// echo key($client); ?></h4>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-sm-12">

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
                                        <a  href="" class="btn btn-danger btn-lg ">Unlink</a>
                                    </div>
                                    <div class="info-box-update pull-right ">
                                        <input type="submit" name="message" value="Message" class="btn btn-primary btn-lg ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

            </div><!-- Modal-body -->

        </div>
    </div>
</div><!-- /.Modal -->
