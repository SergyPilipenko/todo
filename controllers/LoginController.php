<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 09.08.2018
 * Time: 14:20
 */
class LoginController
{
    public function actionEnter()
   {


       require_once (ROOT.'/views/enter/admin.php');
       return true;
    }


}