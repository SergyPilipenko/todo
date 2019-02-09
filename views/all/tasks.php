<?php require_once ROOT . '/views/header.php'; ?>


<div class="container-fluid content-wrapper">
    <div class="container content">
        <div class="row">
            <!-- список задач -->
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="field_to_order" id="name">Имя<span class="up glyphicon"></span></th>
                            <th class="field_to_order" id="email">е-mail<span class="up glyphicon"></span></th>
                            <th>Задача</th>
                            <th class="field_to_order" id="status">Статус<span class="up glyphicon"></span></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="selection">
                        <?php foreach ($result as $res): ?>
                            <tr>
                                <!--th scope="row">1</th-->
                                <td><a href="/task/overview/<?php echo $res['id']; ?>"><img class="img_sm img-rounded"
                                                                                            src="/template/images/product-details/<?php echo $res['image']; ?> "></a>
                                </td>
                                <td><?php echo $res['name'] ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td class="task_body_row"><?php echo mb_substr($res['task'], 0, 100); ?></td>
                                <td class="task_status_row">
                                    <?php if ($res['status'] == 0) {
                                        echo 'Не определено';
                                    } elseif ($res['status'] == 1) {
                                        echo 'Выполнено';
                                    } elseif ($res['status'] == 2) {
                                        echo 'Выполняется';
                                    };
                                    ?></td>
                                <!--td>
                                              <a class="btn btn-default btn-sm" href="/task/overview/1" role="button">Детальнее</a>
                                            </td-->
                                <td>
                                    <a class="btn btn-default btn-sm" href="/task/overview/<?php echo $res['id']; ?>"
                                       role="button">Просмотр</a>


                                    <?php if (isset($_SESSION['admin'])): ?>
                                        <a class="btn btn-warning btn-sm" href="/task/edit/<?php echo $res["id"]; ?>"
                                           role="button">Изменить</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>


            <?php echo $pagination->get(); ?>

        </div>
    </div>
</div>
<script src="/template/js/task.js"></script>

<?php require_once ROOT . '/views/footer.php'; ?>
