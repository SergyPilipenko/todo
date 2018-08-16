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
    <ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li class="active">Авторизация</li>
</ol>

<div class="col-sm-12 col-md-7">

<p>
<!--form action="" method="post">
<table class="login">
	<tr>
		<th colspan="2">Авторизация</th>
	</tr>
	<tr>
		<td>Логин</td>
		<td><input type="text" name="login"></td>
	</tr>
	<tr>
		<td>Пароль</td>
		<td><input type="password" name="password"></td>
	</tr>
	<th colspan="2" style="text-align: right">
	<input type="submit" value="Войти" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form-->

<form action="/admin/admin/page-1" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="login" class="col-sm-2 control-label">Логин</label>
	<div class="col-sm-8">
      <input type="text" class="form-control" id="login" name="login" placeholder="login">
	</div>
  </div>

  <div class="form-group" >
    <label for="password" class="col-sm-2 control-label" >Пароль</label>
	<div class="col-sm-8">
      <input type="password" class="form-control" id="password" name="password" placeholder="password">
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

<?php require_once ROOT. '/views/footer.php';?>