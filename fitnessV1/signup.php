<?php
ob_start();
require_once ("includes/header.php");
?>
<?php

if ($session->is_signed_in()) {

    redirect("index.php");

}

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $forename = trim($_POST['forename']);
    $surname = trim($_POST['surname']);
    $password = trim($_POST['password']);
    $dob = trim($_POST['dob']);
    $height = trim($_POST['height']);
    $weight = trim($_POST['weight']);
    $bmi = trim($_POST['bmi']);
    $goal = trim($_POST['goal']);
    $location = trim($_POST['location']);
    //Method to check the database user.
    $user_found = User::has_an_account($username);



    if ($user_found) {

        $the_message = "This username already exits!" . "<br>";
        $the_message .= "Please use another username.";

    } else {

        $user = new User();
        $user->Username = $username;
        $user->Forename = $forename;
        $user->Surname = $surname;
        $user->Password = $password;
        $user->DoB = $dob;
        $user->Height = $height;
        $user->Weight = $weight;
        $user->BMI = $bmi;
        $user->Goal = $goal;
        $user->Location = $location;

        $user->create();

        redirect("login.php");


    }

} else {

    $the_message = "";

    $username = "";
    $forename = "";
    $surname = "";
    $password = "";
    $dob = "";
    $height = "";
    $weight = "";
    $bmi = "";
    $goal = "";
    $location = "";
}


?>


<div class="col-md-4 col-md-offset-3">

    <h4 class="bg-danger"><?php echo $the_message; ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

        </div>

        <div class="form-group">
            <label for="forename">Forename</label>
            <input type="text" class="form-control" name="forename" value="<?php echo htmlentities($forename); ?>" >

        </div>

        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" name="surname" value="<?php echo htmlentities($surname); ?>" >

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">

        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" name="dob" value="<?php echo htmlentities($dob); ?>" >

        </div>

        <div class="form-group">
            <label for="height">Height</label>
            <input type="text" class="form-control" name="height" value="<?php echo htmlentities($height); ?>" >

        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" name="weight" value="<?php echo htmlentities($weight); ?>" >

        </div>

        <div class="form-group">
            <label for="bmi">BMI</label>
            <input type="text" class="form-control" name="bmi" value="<?php echo htmlentities($bmi); ?>">

        </div>

        <div class="form-group">
            <label for="goal">Your goal</label>
            <input type="text" class="form-control" name="goal" value="<?php echo htmlentities($goal); ?>" >

        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" value="<?php echo htmlentities($location); ?>">

        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>

        <div class="form-group">
            <a href="login.php">Already have an account?</a>

        </div>

    </form>


</div>