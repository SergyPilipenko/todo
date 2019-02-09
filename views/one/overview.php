<?php require_once ROOT . '/views/header.php'; ?>


    <div class="container-fluid content-wrapper">
        <div class="container content">
            <div class="row">


                <ol class="breadcrumb">
                    <li><a href="/">Задачи</a></li>
                    <li class="active">Просмотр</li>


                    <?php foreach ($result as $item): ?>
                    <?php if (isset($_SESSION['admin'])): ?>
                        <li class="pull-right"><a class="btn btn-default btn-sm"
                                                  href="/task/edit/<?php echo $item['id'] ?>" role="button">Редактировать</a>
                        </li>
                    <?php endif; ?>
                </ol>

                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Имя: <b><?php echo $item['name']; ?></b><br>
                                email: <b><?php echo $item['email']; ?></b><br>
                                Статус: <b> <?php if ($item['status'] == 0) {
                                        echo 'Не определено';
                                    } elseif ($item['status'] == 1) {
                                        echo 'Выполнено';
                                    } elseif ($item['status'] == 2) {
                                        echo 'Выполняется';
                                    };
                                    ?></b>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-5"><img class="img-responsive img-thumbnail"
                                                       src="/template/images/product-details/<?php echo $item['image']; ?>"><br>
                            </div>
                            <div class="col-md-7"><p><?php echo $item['task'] ?></p></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>

<?php require_once ROOT . '/views/footer.php'; ?>