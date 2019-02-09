<?php


class Edit
{
    public static function edittask($id)
    {
        $task = strip_tags($_POST['task']);
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

        $result->bindParam(':task', $task, PDO::PARAM_STR);

        $result->bindParam(':status', $_POST['status'], PDO::PARAM_INT);
        return $result->execute();
    }


}