<?php
header('Content-Type: application/json');

require_once ROOT . '/model/AjaxSort.php';

class SortController
{
    public function actionSort()
    {
        $res = AjaxSort::query();
        if (isset($_SESSION['admin'])) {
            $res[0]['secret'] = 'secret';
        }
        echo json_encode($res);
        return true;

    }

}