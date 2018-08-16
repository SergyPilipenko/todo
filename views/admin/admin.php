<?php if($_SESSION['admin']):?>
<?php require_once ROOT .'/views/header.php';?>

<header>
    <nav class="navbar navbar-default header">
        <div class="container ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nb_collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Все задачи</a>
            </div>

            <div class="collapse navbar-collapse" id="nb_collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/task/new">Создать новую задачу</a></li>
                    <!--li  >
                        <a href='/task/edit' >Редактировать</a>
                    </li-->

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>Приветствуем вас, admin<a href="/admin/logout"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Выйти</a> </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid content-wrapper">
    <div class="container content">
        <div class="row">
            <!-- список задач -->
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr><th></th>
                            <th class="field_to_order" id="name">Имя<span class="up glyphicon"></span></th>
                            <th class="field_to_order" id="email">е-mail<span class="up glyphicon"></span></th>
                            <th>Задача</th>
                            <th class="field_to_order" id="status">Статус<span class="up glyphicon"></span></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="selection">
                        <?php foreach($result as $res):?>
                            <tr>
                                <!--th scope="row">1</th-->
                                <td><a href="/task/overview/<?php echo $res['id'];?>"><img class="img_sm img-rounded" src="/template/images/product-details/<?php echo $res['image'];?> "></a></td>
                                <td><?php echo $res['name']?></td>
                                <td><?php echo $res['email'];?></td>
                                <td class="task_body_row" ><?php echo mb_substr($res['task'],0,100);?></td>
                                <td class="task_status_row" >
                                    <?php if($res['status']==0){echo 'Не определено';
                                    }elseif($res['status']==1){echo 'Выполнено';
                                    }elseif($res['status']==2){echo 'Выполняется';};
                                ?></td>
                                <!--td>
                                              <a class="btn btn-default btn-sm" href="/task/overview/1" role="button">Детальнее</a>
                                            </td-->
                                <td>
                                    <a class="btn btn-default btn-sm" href="/task/overview/<?php echo $res['id'];?>" role="button">Просмотр</a>
                                    <a class="btn btn-warning btn-sm" href="/task/edit/<?php echo $res['id'];?>" role="button">Изменить</a><br><br>


                                </td>
                            </tr>
                        <?php endforeach;?>


                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $(".field_to_order").click( function() {

                        var fld = $(this).attr("id");
                        var dt = [];

                        if ($(this).children("span").hasClass("up") ) {
                            var ord = "ASC";  var cls = "";
                        } else { var ord = "DESC"; var cls = "up";	}
                        $(this).children("span").toggleClass( "up" );

                        $.post('/sort/sort',
                            {field:fld, order:ord, data:dt, nclass:cls},
                            function(data_to_sort){
                                $("#selection").html(data_to_sort);
                            }
                        );
                    });
                });
            </script>

            <?php echo $pagination->get();?>

        </div>
    </div>
</div>

    <?php require_once ROOT. '/views/footer.php';?>
<?php endif;?>