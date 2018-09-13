<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 08/04/2017
 * Time: 13:51
 * @param $class
 */

// Using __autoload() to load all the file names that exist into a variable.
function classAutoLoader($class) {


    $class = strtolower($class);

//Checks the includes folder for the file name stored in $class.
    $the_path = "includes/{$class}.php";

//If the files exists.
    if (is_file($the_path) && !class_exists($class)) {

        include $the_path;

    } else {

        die("The file named {$class}.php, was not found!");

    }

}

spl_autoload_register('classAutoLoader');


function redirect($location) {

    header("Location: {$location}");


}

