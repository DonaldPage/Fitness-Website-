<?php

require_once ("new_config.php");

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 07/04/2017
 * Time: 20:44
 */
class Database {

    public $connection;

    /**
     * Database constructor.
     */
    function __construct() {

    //Automatically opens the database connection.
    $this->open_db_connection();

    }// end of constructor

    /**
     *
     */
    public function open_db_connection(){

        //$this->connection =  mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if ($this->connection->connect_errno){

            die("Database connection failed" . $this->connection->connect_error);

        }

    } //end of open_db_connection


    /**
     * @param $sql
     * @return mixed
     */
    public function query($sql){

        $result = $this->connection->query($sql);
        //$result = $this->query($sql);
        $this->confirm_query($result);

        return $result;

    } //end of query

    /**
     * @param $result
     */
    private function confirm_query($result){

        if (!$result){

            die("Query Failed" . $this->connection->error);
        }

    } //end of confirm_query


    /**
     * @param $string
     * @return mixed
     */
    public function escape_string($string){

        $escaped_string = $this->connection->real_escape_string($string);

        return $escaped_string;

    } //end of escape_string


    public function the_insert_id(){

        return $this->connection->insert_id;

    } // end of the_insert_id



}//end of Database

//Enables us to use this class anywhere.
$database = new Database();


