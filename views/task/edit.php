

<?php require_once ROOT .'/views/header.php';?>
<body>

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
                        <li>                   <a href="/login/enter"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Войти как админ</a> </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid content-wrapper">
    <div class="container content">
        <div class="row">

            <?php foreach ($result as $item):?>

            <ol class="breadcrumb">
                <li><a href="/">Задачи</a></li>
                <li class="active">Редактировать</li>

                <li class="pull-right"><a class="btn btn-default btn-sm" href="/task/overview/<?php echo $item['id'];?>" role="button">Просмотр</a>	</li>

            </ol>


            <div class="col-sm-12">
                <form action="/task/update/<?php echo $item['id'];?>" method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">

                                Имя: <b><?php echo $item['name'];?></b><br><input type="hidden" name="name" value="<?php echo $item['name'];?>">
                                email: <b><?php echo $item['email'];?></b><br><input type="hidden" name="email" value="<?php echo $item['email'];?>">
                            </h3>

                        </div>
                        <span style="color:green"><?php if(isset($ok)) echo $ok;?></span>

                        <div class="panel-body">
                            <div class="col-md-5"><p><b>Статус задачи:</b><br> <select class="form-control" name="status" id="status">
                                        <option value="0" > Неопределено </option>
                                        <option value="1" selected>Выполнено</option>
                                        <option value="2" >Выполняется</option>
                                        <option value="3" >Просрочено</option>
                                    </select></p></div>

                            <div class="col-md-12"></div>

                            <div class="col-md-5"><img class="img-responsive img-thumbnail" src="/template/images/product-details/<?php echo $item['image'];?>"><br><input type="hidden" name="InputImg" value="/template/images/product-details/<?php echo $item['image'];?>"></div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <textarea class="form-control" name="task" rows="12" placeholder="<?php echo $item['task'];?>"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4 pull-right">
                                <div class="form-group pull-right">

                                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <?php endforeach;?>
            </div>


        </div>
    </div>
</div>

<?php require_once ROOT. '/views/footer.php';?>
