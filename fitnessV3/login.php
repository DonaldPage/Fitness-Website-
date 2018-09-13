<?php include("includes/header.php"); ?>

<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 08/04/2017
 * Time: 23:22
 */

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//IF THE STRING POSITION(strops) INCLUDES A ERROR STATEMENT

if(strpos($url, 'success')!== false) {

    $the_message = "Your account has been created!";
}

    if (isset($_POST['submit'])) {

        $Username = trim($_POST['username']);
        $Password = trim($_POST['password']);


        $user_found = User::verify_user($Username, $Password);

        $instructor_found = Instructor::verify_instructor($Username, $Password);

    if ($user_found) {

        $session->login($user_found);
        redirect("client_profile.php");

    } elseif ($instructor_found) {

        $session->login($instructor_found);
        redirect("instructor_profile.php");

    } else {

        $the_message = "Your password or username is incorrect";

    }

} else {

    $the_message = "";
    $Username = "";
    $Password = "";

}
?>


<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form id="login-id" action="" method="post">

                <h4 class="bg-danger"><?php echo $the_message; ?></h4>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo htmlentities($Username); ?>" >

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo htmlentities($Password); ?>">

                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                </div>

                <div class="form-group">
                    <a href="signup.php">Don't have an account?</a>

                </div>

            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>