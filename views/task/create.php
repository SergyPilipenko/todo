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
                        <!--li class="disabled" >
                            <a 'href='#' >Редактировать</a>
                        </li-->

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>                   <a href="/login/enter"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Войти как админ</a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<body>
 <div class="container-fluid content-wrapper">
    <div class="container content">
        <div class="row">
            <div class="col-sm-12">

                <form id ="theForm" name="new_task" " action="/create/save" method="post" enctype="multipart/form-data">

                    <span style="color:red" id="namef"><?php if(isset($error) ){
                        foreach ($error as $err)
                            echo $err['0'];}?><br></span>

                    <span id="suc" style="color:green"><?php if(isset($create))echo $create;?></span>

                    <div class="form-group">
                        <label for="InputName">Ваше имя</label>
                        <span style="color:red" id="namef"></span>
                        <input type="text" class="form-control" name="name" id="inp_nm" placeholder="Иван Петрович" value="<?php if(!empty($_POST['name'])) echo $_POST['name'];?>" >
                    </div>

                    <div class="form-group">
                        <label for="InputEmail">Ваш Email</label>
                        <span style="color:red" id="emailf">
                        <input type="email" class="form-control" name="email" id="inp_em" placeholder="Email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>" >
                    </div>

                    <div class="form-group">
                        <label for="InputImg">Изображение:<br>
                            <div class="upload_img_wrapper"><div id="preview_img"></div></div>
                        </label>
                        <input id="inp" type="file" name="image" preview-target-id="preview_img">
                        <p class="help-block">Допустимый формат jpg/gif/png, допустимый размер - не более 320х240 пикселей, размер файла не больше 8192КБ </p>
                        <span><?php if(isset($image_error)) echo $image_error;?></span>
                    </div>
                    <script>
                        $('input[type="file"][preview-target-id]').on('change', function() {
                            var input = $(this)
                            if (!window.FileReader) return false // check for browser support
                            if (input[0].files && input[0].files[0]) {
                                var reader = new FileReader()
                                reader.onload = function (e) {
                                    var target = $('#' + input.attr('preview-target-id'))
                                      var background_image = 'url(' + e.target.result + ')'
                                    target.css('background-image', background_image)
                                    target.parent().show()

                                }
                                reader.readAsDataURL(input[0].files[0]);
                            }
                        })

                    </script>
                    <div class="form-group">
                        <label for="InputTask">Задача</label>
                        <textarea class="form-control" name="task" rows="5" placeholder="Текст задачи" value="<?php if(!empty($_POST['task'])){ echo $_POST['task'];}?>"></textarea>
                    </div>

                    <div class="col-xs-12  col-sm-6 col-md-offset-2 col-md-4">
                        <p><!-- вызов модального окна для предпросмотра -->
                             <input type="button" class="btn btn-default btn-block" name="button_Preview" id="button_Preview" value='Предварительный просмотр' data-toggle="modal" data-target="#Preview">
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <p><input type="submit" class="btn btn-default btn-block" id="sub"  value='Сохранить задачу'></p>
                    </div>
                </form>


                <!-- Modal -->
                <div class="modal fade" id="Preview" tabindex="-1" role="dialog" aria-labelledby="mLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="mLabel">Предварительный просмотр</h4>
                            </div>
                            <div class="modal-body">
                                <div id="toPreview">
                                    <div class="form-group">
                                        <label for="InputImg">Изображение:<br>
                                            <div class="upload_img_wrapper"><div id="preview_img2"></div></div>

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                ><button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- class="col-sm-12" -->

            <script>
                $(document).ready(function() {
                    $("#button_Preview").click(function() {

                        var name  = $('input[name="name"]').val();
                        var email = $('input[name="email"]').val();

                        var task  = $('textarea[name="task"]').val();

                        $.post("/task/ajax",
                            {name:name,email:email,task:task},
                            function(data){

                                $("#toPreview").html(data);

                            }
                        );
                    });
                });
            </script>
        </div>
    </div>
</div>

<?php require_once ROOT. '/views/footer.php';?>