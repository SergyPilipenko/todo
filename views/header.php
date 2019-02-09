<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Задачник</title>

    <link href="/template/css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="/template/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-default header">
        <div class="container ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nb_collapse"
                        aria-expanded="false">
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


                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['admin'])): ?>
                        <li>Приветствуем вас, admin<a href="/admin/logout"> <span class="glyphicon glyphicon-log-out"
                                                                                  aria-hidden="true"></span> Выйти</a>
                        </li>
                    <?php else: ?>
                        <li><a href="/login/enter"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                Войти как админ</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>