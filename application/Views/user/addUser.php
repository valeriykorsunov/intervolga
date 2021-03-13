<?// extract($this->vData); ?>

<? if ($login_status !== "access_granted"):?>
	<div class="container">
		<h2>Форма добавления нового пользователя</h2>
		<form class="row" action="" method="post">
			<div class="form-group col-sm-2">
				<input type="text" name="login" class="form-control" placeholder="Логин" value="<?=$_POST["login"]?>">
			</div>
			<div class="form-group col-sm-2">
				<input type="text" name="name" class="form-control" placeholder="Имя пользователя" value="<?=$_POST["name"]?>">
			</div>
			<div class="form-group col-sm-2">
				<input type="text" name="usgroup" class="form-control" placeholder="Группа" value="<?=$_POST["usgroup"]?>">
			</div>
			<div class="form-group col-sm-2">
				<input type="password" name="pass" class="form-control" placeholder="Пароль" value="">
			</div>
			<div class="col-sm-1">
				<input type="submit" name="btn"  class="btn btn-primary" value="Зарегистрировать">
			</div>
		</form>
	</div>
<?endif?>

<div class="container">
<? if ($login_status == "access_granted"):?>
	<p style="color:green">Авторизация прошла успешно.</p>
<?elseif ($login_status == "access_denied"):?>
	<p style="color:red">Логин и/или пароль введены неверно.</p>
<?endif?>
</div>