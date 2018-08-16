<?php
/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 22.06.2018
 * Time: 9:17
 */
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

define('ROOT',dirname(__FILE__));
require_once (ROOT.'/components/Autoload.php');


$router = new Router();
$router->run();