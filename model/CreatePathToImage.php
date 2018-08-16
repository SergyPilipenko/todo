<?php
class CreatePathToImage
{
    public static function uploadFile()
    {
        //директория, куда сохраняем
        $dir = 'template/images/product-details/';
        // массив разрешеных расширенией
        $extensions = array('jpeg', 'jpg', 'png', 'gif');
        // максимальный размер файла
        $max_size = 50000000;
        // проверяем чтобы размер файла не был больше максимального
        if ($_FILES['image']['size'] > $max_size) {
            return false;
        } else {
            //получаем рассширение файла
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            // проверяем есть ли расширение в массиве допустимых
            if (in_array($ext, $extensions)) {
                //задаем имя файда
                $name = uniqid() . '.' . $ext;
                $path = $dir . $name;
                //сохраняем
                if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                    return $name;
                } else {

                    return false;
                }
            } else {
                $image_error = 'Неверный формат картинки';
                return false;
            }
        }
    }
}

