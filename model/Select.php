<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 03.08.2018
 * Time: 14:08
 */
class Select
{
    public static function getTasks($page)
    {
        // Соединение с БД
        $db = Db::getConnection();
        $page = intval($page);

        //Количество записей на странице
        $count = 3;

        $offset = ($page - 1) * $count;

        // Текст запроса к БД
        $sql = 'SELECT * FROM `tasks` LIMIT :limit OFFSET :offset';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $count, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetchAll();
    }

}