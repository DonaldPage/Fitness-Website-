<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<body>

<?php include("includes/top_nav.php"); ?>

        <div id="page-wrapper">

<?php include("includes/carousel.php"); ?>

        <div class="container-fluid">
            <h2>Hello Word!</h2>
            <div class="row">
                <div class="col-md-4 left">This is the left side</div>
                <div class="col-md-4 centre">This is the centre</div>
                <div class="col-md-4 right">This is the right side</div>
            </div>
            <div class="row">
                <div class="col-md-4 left">
                    <img class="img-responsive" src="images/2017-01-30.png"">
                    <p>Left picture</p>
                </div>
                <div class="col-md-4 left">
                    <img class="img-responsive" src="images/2017-01-30.png"">
                    <p>Centre picture</p>
                </div>
                <div class="col-md-4 left">
                    <img class="img-responsive" src="images/2017-01-30.png"">
                    <p>Right picture</p>
                </div>
            </div>
        </div>

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

        <artical class="index-form">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form>
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </artical>
        </div>



</body>
</html>







