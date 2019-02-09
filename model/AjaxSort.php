<?php


class AjaxSort
{
    public static function query()
    {
        if ($_POST['order'] == 'ASC' && $_POST['field'] == 'name') {
            $_POST['field'] = 'name ASC';
        }
        if ($_POST['order'] == 'DESC' && $_POST['field'] == 'name') {
            $_POST['field'] = 'name DESC';
        }
        if ($_POST['order'] == 'ASC' && $_POST['field'] == 'email') {
            $_POST['field'] = 'email ASC';
        }
        if ($_POST['order'] == 'DESC' && $_POST['field'] == 'email') {
            $_POST['field'] = 'email DESC';
        }
        $p = trim(htmlspecialchars($_POST['field']));

        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "SELECT * FROM tasks ORDER BY $p LIMIT 3";
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        // $result->bindParam(':field',$_POST['field'], PDO::PARAM_INT);


        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result = $result->fetchAll();


    }

}
