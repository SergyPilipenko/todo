<?php


require_once ROOT . '/model/Admin.php';
include_once ROOT . '/model/Select.php';
include_once ROOT . '/components/Pagination.php';
include_once ROOT . '/model/Task.php';

class AdminController
{
    public function actionAdmin($page = 1)

    {
        $result = Select::getTasks($page);
        $total = Task::getTotalTasks();
        $pagination = new Pagination($total, $page, 3, 'page-');


        $_SESSION['admin'] = Admin::isAdmin();


        if (isset($_SESSION['admin'])) {
            require_once ROOT . '/views/admin/admin.php';
        } else {
            require_once ROOT . '/views/admin/login.php';
        }


        return true;

    }

    public function actionEnter()
    {


        require_once(ROOT . '/views/admin/login.php');
        return true;
    }

}