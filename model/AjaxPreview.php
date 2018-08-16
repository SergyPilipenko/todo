<?php
class AjaxPreview
{
    public static function preview()
    {
        /**
         * Created by PhpStorm.
         * User: Sergeys
         * Date: 07.08.2018
         * Time: 11:07
         */
        try {



            // Соединение с БД
            $db = Db::getConnection();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Текст запроса к БД
            $sql = 'INSERT INTO `ajax` (name, email, task) VALUES (:name, :email, :task);';
            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $result->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $result->bindParam(':task', $_POST['task'], PDO::PARAM_STR);

            $result->execute();

            $sql2 = 'SELECT * FROM ajax ORDER BY id DESC ';
            // Используется подготовленный запрос
            $result2 = $db->prepare($sql2);

            // Указываем, что хотим получить данные в виде массива
            $result2->setFetchMode(PDO::FETCH_ASSOC);
            // Выполняем запрос
            $result2->execute();
            // Возвращаем данные
            $res = $result2->fetch();
            echo 'Имя:'.' '. $res['name'];
            echo '<br>';
            echo 'E-mail:'.' '. $res['email'];
            echo '<br>';
            echo 'Задача:'.' '. $res['task'];





        } catch
        (\PDOException $e) {
            throw new \Exception('Ошибка при добавлении задачи.', 0, $e);
        }
    }
}




