<?php require_once ROOT . '/views/header.php'; ?>


    <div class="container-fluid content-wrapper">
        <div class="container content">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li class="active">Авторизация</li>
                </ol>

                <div class="col-sm-12 col-md-7">

                    <p>


                    <form action="/admin/admin/page-1" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="login" class="col-sm-2 control-label">Логин</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="login" name="login" placeholder="login">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" value="Войти" class="btn btn-default">
                            </div>
                        </div>
                    </form>

                    </p>


                </div>

            </div>
        </div>
    </div>

<?php require_once ROOT . '/views/footer.php'; ?>