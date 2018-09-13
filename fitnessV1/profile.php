<?php include("includes/header.php");

header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}
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
                    <?php $found_user = User::find_by_id($_SESSION['user_id']);?>
                    <h1 class="page-header">
                        Profile
                        <small>Welcome <?php echo $found_user->Forename; ?> to your profile page.</small>
                    </h1>
                    <div class="col-md-6">

                        <form action="upload.php">

                            <input class="btn btn-primary" type="submit" name="upload" value="Upload">

                        </form>

                        <?php

                        //        $result_set = User::find_all_users();
                        //
                        //        while ($row = mysqli_fetch_array($result_set)) {
                        //
                        //            echo $row['Forename'] . "<br>";
                        //        }




                        //        $found_user = User::find_by_id(1);
                        //
                        //        $user = User::instantiation($found_user);
                        //
                        //        echo $user->Forename;
                        //        echo $found_user['Surname'] . " ";
                        //
                        //        echo $found_user['Forename'];

                        //        $users = User::find_all();
                        //
                        //        foreach ($users as $user){
                        //
                        //            echo $user->Forename . "<br>";
                        //        }

                        //        $found_user = User::find_by_id(1);
                        //
                        //        echo $found_user->Forename . "<br>";

                        //        $user = new User();
                        //
                        //                $user->Username = "betterboxy";
                        //                $user->Forename = "Ian";
                        //                $user->Surname = "Boxell";
                        //                $user->Password = "1234";
                        //                $user->DoB = "1982-04-07";
                        //                $user->Height = "6ft3";
                        //                $user->Weight = "91kg";
                        //                $user->BMI = "123";
                        //                $user->Goal = "Weigh Loss";
                        //                $user->Location = "Shebbear";
                        //
                        //                $user->create();

                        //        $user = User::find_by_id(10);
                        //        $user->Forename = "Daniel";
                        //        $user->Surname = "Collinson";
                        //        $user->Weight = "90kg";
                        //
                        //        $user->update();

                        //        $user = User::find_by_id(12);
                        //
                        //        $user->delete();
                        ?>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</section>
