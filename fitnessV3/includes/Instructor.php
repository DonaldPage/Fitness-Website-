<?php

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 19/04/2017
 * Time: 11:30
 */
class Instructor extends Db_object {


    protected static $db_table = "instructors";
    protected static $db_table_fields = array('Username', 'Password', 'UserLevel', 'Forename', 'Surname', 'Location', 'SpecialtyOne', 'SpecialtyTwo', 'SpecialtyThree');
    public $id;
    public $Username;
    public $Password;
    public $UserLevel;
    public $Forename;
    public $Surname;
    public $Location;
    public $SpecialtyOne;
    public $SpecialtyTwo;
    public $SpecialtyThree;

    public $upload_dir = "profileImages";
    public $image_placeholder = "avatar.svg";


    public function image_path(){

        return empty($this->User_image) ? $this->upload_dir.DS.$this->image_placeholder : $this->upload_dir.DS.$this->User_image;

    } //end of image_path


    public static function verify_instructor($Username,$Password) {
        global $database;

        $Username = $database->escape_string($Username);
        $Password = $database->escape_string($Password);

        $sql = "SELECT * FROM instructors WHERE ";
        $sql .= "Username = '{$Username}' ";
        $sql .= "AND Password = '{$Password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    } //end of verify_instructor


    public static function find_my_instructor($Location, $Goal){
        global $database;

        $Location = $database->escape_string($Location);
        $Goal = $database->escape_string($Goal);

        return static::find_by_query("SELECT * FROM instructors WHERE Location= '{$Location}' AND SpecialtyOne = '{$Goal}'");


    }


} //end of class