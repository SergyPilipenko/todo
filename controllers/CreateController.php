<?php
include_once ROOT.'/model/Task.php';
include_once ROOT.'/model/CreatePathToImage.php';
/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 03.08.2018
 * Time: 10:14
 */
class CreateController
{
    public
    function actionSave()
    {
           $error = array();
           $errors =false;
          // $errors = false;
           // При необходимости можно валидировать значения нужным образом
           if (!isset($_POST['name']) || empty($_POST['name'])) {
               $error['name'][] = '  Заполните имя <br>';
               $errors[] =true;
           }

           // При необходимости можно валидировать значения нужным образом
           if (!isset($_POST['email']) || empty($_POST['email'])) {
               $error['email'][] = '  Заполните поле email <br>';
               $errors[] =true;
           }
           if (preg_match("~/.+@.+\..+/i~", $_POST['email'])) {
               $errors[] =true;
               $error['email_exist'][] = '  Не правильный  email <br>';

           }
            if (!isset($_POST['task']) || empty($_POST['task'])) {
               $error['task'][] = 'Заполните поле задача';
               $errors[] =true;
           }
           if(!empty($_POST['image'])) {
               $path = $_FILES['image']['name'];
               $ext = pathinfo($path, PATHINFO_EXTENSION);
               if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg') {
                   $image_error = 'Не правильный формат';
               }
           }

           if ($errors == false) {
               $_POST['image'] = CreatePathToImage::uploadFile();


               $id = Task::createTask($_POST);
               $create = 'Задача успешно добавлена';

           }

            include_once ROOT.'/views/task/create.php';






           return true;



    }

    public function actionNew()
    {
        require_once(ROOT . '/views/task/create.php');
        return true;


    }
}
