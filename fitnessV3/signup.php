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
    $bmi;
    $goal = trim($_POST['goal']);
    $location = trim($_POST['location']);
    //Method to check the database user.
    $user_found = User::has_an_account($username);



    if ($user_found) {

        $the_message = "This username already exits!" . "<br>";
        $the_message .= "Please use another username.";

    } else {

        //Calculates the persons bmi
        $bmi_calc = $weight/$height/$height;
        //limits the decimal points to 1
        $bmi = round($bmi_calc, 1);


        $user = new User();
        $user->Username = $username;
        $user->UserLevel = 1;
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

        redirect("login.php?success");


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
            <label for="height">Height in metres</label><br>
                <input list="heights" name="height" value="<?php echo htmlentities($height); ?>" size="6" MULTIPLE>
                    <datalist id="heights">
                        <!-- 4ft 9-->
                        <option value="1.45"></option>
                        <option value="1.50"></option>
                        <option value="1.52"></option>
                        <option value="1.52"></option>
                        <option value="1.55"></option>
                        <option value="1.57"></option>
                        <option value="1.60"></option>
                        <option value="1.63"></option>
                        <option value="1.65"></option>
                        <option value="1.68"></option>
                        <option value="1.70"></option>
                        <option value="1.73"></option>
                        <option value="1.75"></option>
                        <option value="1.77"></option>
                        <option value="1.80"></option>
                        <option value="1.83"></option>
                        <option value="1.85"></option>
                        <option value="1.87"></option>
                        <option value="1.91"></option>
                        <option value="1.93"></option>
                        <option value="1.96"></option>
                        <!-- 6ft 6-->
                        <option value="1.98"></option>
                    </datalist>
        </div>
        <!--
        <div class="form-group">
            <label for="height">Height</label>
            <input type="text" class="form-control" name="height" value="<?php echo htmlentities($height); ?>" >

        </div> -->

        <div class="form-group">
            <label for="weight">Weight in Kgs</label>
            <input type="text" class="form-control" name="weight" placeholder="e.g 74.8" value="<?php echo htmlentities($weight); ?>" >

        </div>



        <div class="form-group">
            <label for="goal">Goal</label>
            <div class="radio">
                <label><input type="radio" name="goal" value="Weight Loss">Weight Loss</label>
                <label> </label>
                <label><input type="radio" name="goal" value="Tone Up">Tone Up</label>
            </div>
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