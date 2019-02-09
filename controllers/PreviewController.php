<?php


include ROOT . '/model/SimpleImage.php';


class PreviewController
{
    public function actionAjax()
    {

        if (isset($_FILES['file'])) {

            $paramsPath = ROOT . '/config/file.php';
            $params = include($paramsPath);
            // проверяем чтобы размер файла не был больше максимального
            if ($_FILES['file']['size'] > $params['max_size']) {
                $_SESSION['error'] = '<p id="error_img">Размер картинки больше положеного</p>';
                return false;
            } else {
                //получаем рассширение файла
                $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                // проверяем есть ли расширение в массиве допустимых
                if (in_array($ext, $params['extensions'])) {

                    $_SESSION['error'] = '';

                    $newImageName = uniqid() . '.' . $ext;

                    $image = new SimpleImage();
                    $image->load($_FILES['file']['tmp_name']);
                    $image->resize(320, 240);
                    $image->save($params['dir'] . $newImageName);


                    //очитска памяти при сабмите
                    $_SESSION['clear_memory'] .= $params['dir'] . $newImageName . '|';


                    $result = $newImageName;

                    if (!empty($result)) {
                        echo json_encode(array('img' => $result));
                    }


                } else {

                    echo json_encode(array('error' => true));
                    return true;
                }


            }


        }


        return true;
    }


}