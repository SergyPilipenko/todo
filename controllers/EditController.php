<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 11.08.2018
 * Time: 12:20
 */
require_once ROOT. '/model/Edit.php';
require_once ROOT.'/model/Onetask.php';
class EditController
{
    public function actionEdit($id)
    {
        $result = Onetask::overview($id);


            require_once ROOT. '/views/task/edit.php';



        return true;

    }
    public function actionSave($id)
    {
        $result = Onetask::overview($id);
        $res = Edit::edittask($id);
        if($res){
            $ok = 'Задача успешно обновлена';
            require_once ROOT. '/views/task/edit.php';


        }
        return true;

    }

}