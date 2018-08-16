<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 22.06.2018
 * Time: 15:34
 */
class Db
{
   public static function getConnection(){
       $paramsPath = ROOT.'/config/db_params.php';
       $params = include ($paramsPath);

       $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
       $db = new PDO($dsn,$params['user'],$params['password']);
       return $db;


}
}