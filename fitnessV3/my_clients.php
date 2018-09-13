<?php include("includes/header.php"); ?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php



$id = $_SESSION['user_id'];

$clients = User::find_my_clients($id);






?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


    <!-- Top Menu Items -->
    <?php include("includes/instructor_top_nav.php"); ?>


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
                            My Clients:
                            <small>Welcome <?php echo $found_user->Forename;

                              //  print_r($clients);

                            ?> to your client list.</small>
                        </h1>
                    </div>

                </div>
                <div class="col-sm-1"></div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                        <table class="table table-hover">
                            <thread>
                                <tr>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Goal</th>
                                    <th>Location</th>
                                </tr>
                            </thread>
                            <tbody>


                            <?php foreach ($clients as $client) :

                                //HOW DO I GET THE ID OF EACH OBJECT WITHIN THE LOOP?

                                ?>

                                <tr>
                                    <td>
                                        <a href="profile_info.php?id=<?php echo $client->id; ?>"><img class="user_image" style="width: 62px; height: 62px"  src="<?php echo $client->image_path(); ?>" alt=""></a>
                                        <?php include ("client_modal.php"); ?>
                                    </td>
                                    <td><?php echo $client->Username; ?></td>
                                    <td><?php echo $client->Forename; ?></td>
                                    <td><?php echo $client->Surname; ?></td>
                                    <td><?php echo $client->Goal; ?></td>
                                    <td><?php echo $client->Location; ?></td>
                                </tr>



                            <?php endforeach;

                            ?>

                            </tbody>

                        </table>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>


            <!-- If the user has no clients, this will show instead of any content -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <?php

                    if (!$client){

                    ?>
                    <div class="col-sm-8">
                        <h1><small><?php echo $found_user->Forename?>, you do not have any clients.</small>
                            <small> Click on the Upload button to add a client!.</small></h1> <?php
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
