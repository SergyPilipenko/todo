<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 03.08.2018
 * Time: 11:03
 */
include_once ROOT.'/model/Select.php';
include_once ROOT.'/components/Pagination.php';
include_once ROOT.'/model/Task.php';

class SiteController
{
    public function actionIndex($page=1)
    {

      $result = Select::getTasks($page);
      $total = Task::getTotalTasks();
      $pagination = new Pagination($total,$page,3,'page-');

      require_once(ROOT . '/views/all/tasks.php');
      return true;
    }

}