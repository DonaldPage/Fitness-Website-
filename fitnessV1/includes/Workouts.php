<?php

/**
 * Created by PhpStorm.
 * User: Don
 * Date: 10/04/2017
 * Time: 19:59
 */
class Workouts extends Db_object {


    protected static $db_table = "workouts";
    protected static $db_table_fields = array('Name', 'pdfLocation', 'WeightLoss', 'Cardio', 'WeightGain', 'Location');
    public $u_ID;
    public $Name;
    public $pdfLocation;
    public $WeightLoss;
    public $Cardio;
    public $WeightGain;
    public $Location;


} //end of class