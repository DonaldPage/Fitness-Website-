<?php include("includes/header.php"); ?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php


if (empty($_GET['id'])){

    redirect("profile_info.php");

}


$client = User::find_by_id($_GET['id']);

    if ($client) {

        $client->unlink($_GET['id']);

        redirect("my_clients.php");

    }

?>