<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 03.08.2018
 * Time: 10:29
 */
class Task
{
    public static function createTask($options)
    {
        try {


            // Соединение с БД
            $db = Db::getConnection();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Текст запроса к БД
            $sql = 'INSERT INTO `tasks` (`name`, email, task, image) VALUES (:name, :email, :task, :image);';
            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
            $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
            $result->bindParam(':task', $options['task'], PDO::PARAM_STR);
            $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
            return $result->execute();



        } catch (\PDOException $e) {
            throw new \Exception('Ошибка при добавлении задачи.', 0, $e);
        }







    }
    public static function getTotalTasks()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM tasks ';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Выполнение коменды
        $result->execute();
        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }


}