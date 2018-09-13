<?php

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 10/04/2017
 * Time: 18:48
 */
class Db_object
{

    //protected static $db_table = "users";

    public static function find_all(){

        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");

    } //end of find_all_users


    /**
     * @param $u_ID
     * @return bool|mixed
     */
    public static function find_by_id($u_ID){

        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE u_ID= $u_ID LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    } //end of find_user_by_id


    public static function find_by_query($sql) {
        global $database;

        $result_set = $database->query($sql);
        //creates empty array
        $the_object_array = array();
        //fetches the data from the database
        while ($row = mysqli_fetch_array($result_set)){
            //Uses instantiation to loop through all the object properties
            $the_object_array[] = static::instantiation($row);

        }
        return $the_object_array;

    } //end of find_this_query


    /**
     * @param $the_record
     * @return mixed
     */
    //Loops though the array and returns all the values.
    public static function instantiation($the_record){

        $calling_class = get_called_class();

        $the_object = new $calling_class;

        foreach ($the_record as $the_attribute => $value) {

            if ($the_object->has_the_attribute($the_attribute)) {

                $the_object->$the_attribute = $value;
            }

        }

        return $the_object;
    } //end of instantiation


    /**
     * @param $the_attribute
     * @return bool
     */
    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);


    } //end of has_the_attribute


    protected function properties(){

        $properties = array();

        foreach (static::$db_table_fields as $db_field){

            if (property_exists($this, $db_field)){

                $properties[$db_field] = $this->$db_field;

            }

        }

        return $properties;

    } //end of properties


    protected function clean_properties(){
        global $database;

        //Uses the escape_string method to clean the properties before we use
        //them in any of our other methods.
        $clean_properties = array();

        foreach ($this->properties() as $key => $value){

            $clean_properties[$key] = $database->escape_string($value);

        }

        return $clean_properties;

    } //end of clean_properties
    
    
    public function save(){

        return isset($this->u_ID) ? $this->update() : $this->create();

    } //end of save


    public function create(){
        global $database;

        $properties = $this->clean_properties();


        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";


        //    $sql .= $database->escape_string(array_values()) . "', '";
        //    $sql .= $database->escape_string($this->Forename) . "', '";
        //    $sql .= $database->escape_string($this->Surname) . "', '";
        //    $sql .= $database->escape_string($this->Password) . "', '";
        //    $sql .= $database->escape_string($this->DoB) . "', '";
        //    $sql .= $database->escape_string($this->Height) . "', '";
        //    $sql .= $database->escape_string($this->Weight) . "', '";
        //    $sql .= $database->escape_string($this->BMI) . "', '";
        //    $sql .= $database->escape_string($this->Goal) . "', '";
        //    $sql .= $database->escape_string($this->Location) . "')";

        if ($database->query($sql)) {

            $this->u_ID = $database->the_insert_id();

            return true;

        } else {

            return false;

        }


    } //end of create


    public  function update() {
        global $database;

        //making a new properties object
        $properties = $this->clean_properties();

        //making an empty array
        $properties_pairs = array();

        foreach ($properties as $key => $value){

            //assigning the key and the value to the empty array
            $properties_pairs[] = "{$key}='{$value}'";

        }

        $sql = "UPDATE ". static::$db_table . " SET ";
        $sql .= implode(",", $properties_pairs);
        $sql .= " WHERE u_ID= " . $database->escape_string($this->u_ID);
//    $sql .= "Username= '" . $database->escape_string($this->Username) . "', ";
//    $sql .= "Forename= '" . $database->escape_string($this->Forename) . "', ";
//    $sql .= "Surname= '" . $database->escape_string($this->Surname) . "', ";
//    $sql .= "Password= '" . $database->escape_string($this->Password) . "', ";
//    $sql .= "DoB= " . $database->escape_string($this->DoB) . ", ";
//    $sql .= "Height= '" . $database->escape_string($this->Height) . "', ";
//    $sql .= "Weight= '" . $database->escape_string($this->Weight) . "', ";
//    $sql .= "BMI= '" . $database->escape_string($this->BMI) . "', ";
//    $sql .= "Goal= '" . $database->escape_string($this->Goal) . "', ";
//    $sql .= "Location= '" . $database->escape_string($this->Location) . "' ";
//    $sql .= " WHERE u_ID= " . $database->escape_string($this->u_ID);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    } //end of update


    public function delete() {
        global $database;


        $sql = "DELETE FROM ". static::$db_table ." ";
        $sql .= "WHERE u_ID= " . $database->escape_string($this->u_ID);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    } //end of delete


} //end of Db_object