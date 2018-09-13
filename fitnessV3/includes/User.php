<?php

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 07/04/2017
 * Time: 22:00
 */
class User extends Db_object {


    protected static $db_table = "users";
    protected static $db_table_fields = array('Username', 'UserLevel', 'Forename', 'Surname', 'User_image', 'Password', 'DoB', 'Height', 'Weight', 'BMI', 'Goal', 'Location', 'InstructorID');
    public $id;
    public $Username;
    public $UserLevel;
    public $Forename;
    public $Surname;
    public $User_image;
    public $Password;
    public $DoB;
    public $Height;
    public $Weight;
    public $BMI;
    public $Goal;
    public $Location;
    public $InstructorID;

    public $upload_dir = "profileImages";
    public $image_placeholder = "avatar.svg";


    public function image_path(){

        return empty($this->User_image) ? $this->upload_dir.DS.$this->image_placeholder : $this->upload_dir.DS.$this->User_image;

    }


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





    public static function has_an_account($Username) {
        global $database;

        $Username = $database->escape_string($Username);

        $sql = "SELECT username FROM users WHERE ";
        $sql .= "Username = '{$Username}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        //Using a Ternary Operator to run the condition instead of the if statement.
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    } //end of has_an_account


    public static function find_my_clients($id){

        return static::find_by_query("SELECT * FROM users WHERE InstructorID= $id");


    } //end of find_my_clients


    public static function unlink($id){
        global $database;

        $sql = "UPDATE users SET InstructorID= 0 WHERE id=$id";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }





//    public function delete_user(){
//
//        if ($this->delete()){
//
//            $target_path = SITE_ROOT.DS.$this->upload_dir.DS.$this->User_image;
//
//            return unlink($target_path) ? true : false;
//
//        } else {
//
//            return false;
//
//        }
//
//    } //end of delete_user


} //end of User