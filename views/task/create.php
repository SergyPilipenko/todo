<?php require_once ROOT . '/views/header.php'; ?>

    <div class="container-fluid content-wrapper">
        <div class="container content">
            <div class="row">
                <div class="col-sm-12">

                    <form id="theForm" name="new_task"
                    " action="/create/save" method="post" enctype="multipart/form-data">

                    <span style="color:red" id="namef"><?php if (isset($error)) {
                            foreach ($error as $err)
                                echo $err['0'];
                        } ?><br></span>

                    <span id="suc" style="color:green"><?php if (isset($create)) echo $create; ?></span>

                    <div class="form-group">
                        <label for="InputName">Ваше имя</label>
                        <span style="color:red" id="namef"></span>
                        <input type="text" class="form-control" required name="name" id="inp_nm"
                               placeholder="Иван Петрович"
                        >
                    </div>

                    <div class="form-group">
                        <label for="InputEmail">Ваш Email</label>
                        <span style="color:red" id="emailf">
                        <input type="email" class="form-control" required name="email" id="inp_em" placeholder="Email"
                        >
                    </div>

                    <div class="form-group">
                        <label for="InputImg">Изображение:<br>
                            <div class="upload_img_wrapper">
                                <div id="preview_img"></div>
                            </div>
                        </label>
                        <span style="color: red;font-size: 20px"
                              class="input_error"><?php if (isset($wrong_format)) echo $wrong_format; ?></span>
                        <input id="inp" type="file" name="image" preview-target-id="preview_img">
                        <p class="help-block">Допустимый формат jpg/gif/png, допустимый размер - не более 320х240
                            пикселей, размер файла не больше 8192КБ </p>

                    </div>

                    <div class="form-group">
                        <label for="InputTask">Задача</label>
                        <textarea class="form-control" required name="task" rows="5" placeholder="Текст задачи"
                        ></textarea>
                    </div>

                    <div class="col-xs-12  col-sm-6 col-md-offset-2 col-md-4">
                        <p><!-- вызов модального окна для предпросмотра -->
                            <input type="button" class="btn btn-default btn-block" name="button_Preview"
                                   id="button_Preview" value='Предварительный просмотр' data-toggle="modal"
                                   data-target="#Preview">
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <p><input type="submit" class="btn btn-default btn-block" id="sub" value='Сохранить задачу'></p>
                    </div>
                    </form>


                    <!-- Modal -->
                    <div class="modal fade" id="Preview" tabindex="-1" role="dialog" aria-labelledby="mLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title" id="mLabel">Предварительный просмотр</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="toPreview">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="close_modal" type="button" class="btn btn-default" data-dismiss="modal">
                                        Закрыть
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- class="col-sm-12" -->


            </div>
        </div>
    </div>
    <script src="/template/js/image.js"></script>
    <script src="/template/js/prew.js"></script>
<?php require_once ROOT . '/views/footer.php'; ?>