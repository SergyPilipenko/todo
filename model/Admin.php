<?php


class Admin
{
    public static function isAdmin()
    {

        $db = Db::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM users WHERE login = :login AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $_POST['login'], PDO::PARAM_INT);
        $result->bindParam(':password', $_POST['password'], PDO::PARAM_INT);
        $result->execute();

         return $user = $result->fetch();



    }


}