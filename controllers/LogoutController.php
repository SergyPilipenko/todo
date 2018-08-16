<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 11.08.2018
 * Time: 9:38
 */
class LogoutController
{
    public function actionLogout()
    {
        session_destroy();
        header('location:/');
        return true;
    }

}