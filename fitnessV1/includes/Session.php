<?php

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 08/04/2017
 * Time: 20:18
 */
class Session
{

    private $signed_in =false;
    public $user_id;
    public $message;

    function __construct() {

        session_start();
        $this->check_the_login();
        $this->check_message();

    } //end of constructor


    //This method just returns the value of true or false depending
    //on which state the user is in
    public function is_signed_in() {

       return $this->signed_in;

    } //end of is_signed_in


    //Checks the database to see if the user exists
    /**
     * @param $user
     */
    public function login($user) {

        //if the user exists
        if ($user) {

            //assign the session to user_id and u_ID from the User class
            $this->user_id = $_SESSION['user_id'] = $user->u_ID;
            $this->signed_in = true;
        }

    } //end of login


    public function logout() {

        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;

    } //end od logout


    private function check_the_login(){

        if (isset($_SESSION['user_id'])) {

            $this->user_id = $_SESSION['user_id'];

            $this->signed_in = true;

        } else {

            unset($this->user_id);
            $this->signed_in = false;

        }

    } //end of check_the_login


    public function message($msg="") {

        if (!empty($msg)) {
            $_SESSION['message'] = $msg;

        } else {

            return $this->message;

        }

    }


    public function check_message() {

        if (isset($_SESSION['message'])) {

            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);

        } else {

            $this->message = "";
        }
    }
}

$session = new Session();