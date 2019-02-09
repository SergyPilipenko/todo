<?php

include_once ROOT . '/model/Task.php';
include ROOT . '/model/SimpleImage.php';

class CreateController
{
    public
    function actionSave()
    {
        $error = array();
        $errors = false;
        // $errors = false;
        // При необходимости можно валидировать значения нужным образом
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            $error['name'][] = '  Заполните имя <br>';
            $errors[] = true;
        }

        // При необходимости можно валидировать значения нужным образом
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $error['email'][] = '  Заполните поле email <br>';
            $errors[] = true;
        }
        if (preg_match("~/.+@.+\..+/i~", $_POST['email'])) {
            $errors[] = true;
            $error['email_exist'][] = '  Не правильный  email <br>';

        }
        if (!isset($_POST['task']) || empty($_POST['task'])) {
            $error['task'][] = 'Заполните поле задача';
            $errors[] = true;
        }


        if ($errors == false) {
            $paramsPath = ROOT . '/config/file.php';
            $params = include($paramsPath);


            if ($_FILES['image']['size'] > $params['max_size']) {
                return false;
            } else {
                //получаем рассширение файла
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                // проверяем есть ли расширение в массиве допустимых
                if (in_array($ext, $params['extensions'])) {
                    $_SESSION['error'] = '';
                    $NewImageName = uniqid() . '.' . $ext;
                    $image = new SimpleImage();
                    $image->load($_FILES['image']['tmp_name']);
                    $image->resize(320, 240);
                    $image->save($params['dir'] . $NewImageName);


                } else {
                    $wrong_format = '<p id="error_img">Неверный формат</p>';
                    return false;
                }
            }
            $_POST['image'] = $NewImageName;


            //удаление временных файлов
            if (isset($_SESSION['clear_memory'])) {
                $last_symbol_del = substr($_SESSION['clear_memory'], 0, -1);
                $items = explode('|', $last_symbol_del);
                foreach ($items as $item) {
                    if (!empty($item)) {
                        unlink($item);
                    }

                }
                $_SESSION['clear_memory'] = '';
            }


            $id = Task::createTask($_POST);
            $create = 'Задача успешно добавлена';


        } else {
            return false;
        }

        include_once ROOT . '/views/task/create.php';
        return true;


    }

    public function actionNew()
    {
        require_once(ROOT . '/views/task/create.php');
        return true;


    }
}
