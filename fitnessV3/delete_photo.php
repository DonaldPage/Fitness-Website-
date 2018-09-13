<?php include("includes/header.php"); ?>

<?php
//If the page cannot find the session the run the function to redirect them.
if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php


if (empty($_GET['id'])){

    redirect("client_gallery.php");

}

$photo = Photo::find_by_id($_GET['id']);

if ($photo){

    $photo->delete_photo();
    redirect("client_gallery.php");
} else {

    redirect("client_gallery.php");

}




?>