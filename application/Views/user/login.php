<? extract($this->vData); ?>

<? if ($login_status !== "access_granted"):?>
	<div class="container">
		<h1>Вы не авторизованы</h1>
		<form class="row" action="" method="post">
			<div class="form-group col-sm-2">
				<input type="text" name="login" class="form-control" placeholder="Логин" value="">
			</div>
			<div class="form-group col-sm-2">
				<input type="password" name="password" class="form-control" placeholder="Пароль" value="">
			</div>
			<div class="col-sm-1">
				<input type="submit" name="btn"  class="btn btn-primary" value="Войти">
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