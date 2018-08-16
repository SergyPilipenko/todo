<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 10.07.2018
 * Time: 14:03
 */
abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if($user['role'] =='admin' ){

            return true;
        }
        die('Access denied');
    }

}