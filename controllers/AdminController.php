<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 09.08.2018
 * Time: 17:13
 */
require_once ROOT.'/model/Admin.php';
include_once ROOT.'/model/Select.php';
include_once ROOT.'/components/Pagination.php';
include_once ROOT.'/model/Task.php';

class AdminController
{
    public function actionAdmin($page = 1)

    {
        $result = Select::getTasks($page);
        $total = Task::getTotalTasks();
        $pagination = new Pagination($total,$page,3,'page-');


        Admin::isAdmin();


       if( isset($_SESSION['admin'])) {
           require_once ROOT . '/views/admin/admin.php';
       }else{
           require_once ROOT . '/views/enter/admin.php';
       }




        return true;

    }

}