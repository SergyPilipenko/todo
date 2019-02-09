<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 11.08.2018
 * Time: 10:47
 */
require_once ROOT . '/model/Onetask.php';

class OnetaskController
{
    public function actionOverview($id)
    {
        $result = Onetask::overview($id);
        require_once ROOT . '/views/one/overview.php';
        return true;

    }

}