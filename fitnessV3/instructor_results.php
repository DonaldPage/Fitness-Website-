<?php include("includes/header.php"); ?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}?>



<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


    <!-- Top Menu Items -->
    <?php include("includes/client_top_nav.php"); ?>

    <?php

    $location = $_GET['location'];
echo $location;
    $goal = $found_user->Goal;
    echo $goal;

    $instructors = Instructor::find_my_instructor($location, $goal);


    print_r($instructors);
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
                            My Clients:
                            <small>Welcome <?php echo $found_user->Forename; ?> to your client list.</small>
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

                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Speciality</th>
                                    <th>Location</th>
                                </tr>
                            </thread>
                            <tbody>


                            <?php foreach ($instructors as $instructor) :

                                //HOW DO I GET THE ID OF EACH OBJECT WITHIN THE LOOP?

                                ?>

                                <tr>
                                    <!--
                                    <td>
                                        <img class="user_image" style="width: 62px; height: 62px"  src="<?php// echo $instructor->image_path(); ?>" alt="">
                                    </td -->
                                    <td><?php echo $instructor->Username; ?></td>
                                    <td><?php echo $instructor->Forename; ?></td>
                                    <td><?php echo $instructor->Surname; ?></td>
                                    <td><?php echo $instructor->SpecialtyOne; ?></td>
                                    <td><?php echo $instructor->Location; ?></td>
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

                    if (!$instructors){

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
