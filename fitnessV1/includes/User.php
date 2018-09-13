<?php

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 07/04/2017
 * Time: 22:00
 */
class User extends Db_object {


    protected static $db_table = "users";
    protected static $db_table_fields = array('Username', 'Forename', 'Surname', 'Password', 'DoB', 'Height', 'Weight', 'BMI', 'Goal', 'Location');
    public $u_ID;
    public $Username;
    public $Forename;
    public $Surname;
    public $Password;
    public $DoB;
    public $Height;
    public $Weight;
    public $BMI;
    public $Goal;
    public $Location;


    public static function verify_user($Username,$Password) {
    global $database;

        $Username = $database->escape_string($Username);
        $Password = $database->escape_string($Password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "Username = '{$Username}' ";
        $sql .= "AND Password = '{$Password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    } // end of verify_user


    public static function has_an_account($username) {
        global $database;

        $username = $database->escape_string($username);

        $sql = "SELECT username FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        //Using a Ternary Operator to run the condition instead of the if statement.
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    } //end of has_an_account


} //end of User