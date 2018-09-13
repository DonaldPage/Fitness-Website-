<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 07/04/2017
 * Time: 20:09
 */

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS.'Program Files (x86)'.DS.'EasyPHP-Devserver-16.1'.DS.'eds-www'.DS.'fitness');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'includes');

require_once ("db_object.php");
require_once ("functions.php");
require_once ("new_config.php");
require_once ("Database.php");
require_once ("User.php");
require_once ('photo.php');
require_once ('Session.php');