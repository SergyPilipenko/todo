<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 11.08.2018
 * Time: 15:43
 */
require_once ROOT.'/model/AjaxSort.php';
class SortController
{
    public function actionSort()
    {
        AjaxSort::query();
        return true;

    }

}