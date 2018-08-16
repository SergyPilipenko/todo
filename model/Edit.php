<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 11.08.2018
 * Time: 12:26
 */
class Edit
{
    public static function edittask($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE tasks
            SET 
                task = :task, 
                
                status = :status
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->bindParam(':task', $_POST['task'], PDO::PARAM_STR);

        $result->bindParam(':status', $_POST['status'], PDO::PARAM_INT);
        return  $result->execute();
    }


}