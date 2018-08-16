<?php

/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 11.08.2018
 * Time: 15:45
 */
class AjaxSort
{
    public static function query()
    {
        if($_POST['order']=='ASC'&& $_POST['field']=='name'){
            $_POST['field']='name ASC';
        }
        if($_POST['order']=='DESC'&& $_POST['field']=='name'){
            $_POST['field']='name DESC';
        }
        if($_POST['order']=='ASC'&& $_POST['field']=='email'){
            $_POST['field']='email ASC';
        }
        if($_POST['order']=='DESC'&& $_POST['field']=='email'){
            $_POST['field']='email DESC';
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
        $result = $result->fetchAll();


      foreach($result as $res) {

  
     echo'<tr>';

     echo'<td><a href="/task/overview/'. $res["id"].'"><img class="img_sm img-rounded" src="/template/images/product-details/'. $res["image"].' "></a></td>';

     echo ' <td>'.$res["name"].'</td>';
      echo'<td>'.$res["email"].'</td>';
     echo '<td class="task_body_row" >'. $res["task"].'</td>';

     echo'<td class="task_status_row" >';
                                  if($res["status"]==0){echo "Не определено";
                                   }elseif($res["status"]==1){echo "Выполнено";
                                   }elseif($res["status"]==2){echo "Выполняется";}

          echo'</td>';

         echo '<a class="btn btn-default btn-sm" href="/task/overview/' . $res["id"]. '" role="button">Детальнее</a>';

         echo '<td>';
         echo'<a class="btn btn-default btn-sm" href="task/overview/'. $res["id"].'" role="button">Просмотр</a>';
         echo'<a class="btn btn-warning btn-sm" href="/task/edit/'. $res["id"].'" role="button">Изменить</a><br><br>';

          echo'</td>';
          echo'</tr>';


         }
    }

}
