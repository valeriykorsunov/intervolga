<? extract($this->vData); ?>

<div class="container">
	<h2>Форма добавления нового пользователя</h2>
	<form action="" method="post">
		<input type="text" name="ID" value="<?= $userList["USER_ID"] ?>" hidden>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Логин:</label>
			<div class="col-sm-10">
				<input type="text" name="login" class="form-control" value="<?= $userList["LOGIN"] ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Имя пользователя:</label>
			<div class="col-sm-10">
				<input type="text" name="name" class="form-control" value="<?= $userList["NAME"] ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Группа:</label>
			<div class="col-sm-10">
				<input type="text" name="usgroup" class="form-control" value="<?= $userList["USER_GROUP"] ?>">
			</div>
		</div>

		<div class="form-group">
			<input type="submit" name="btn" class="btn btn-primary" value="Изменить реквизиты">
		</div>
	</form>
</div>

<div class="container">
	<form action="" method="post">
		<input type="text" name="ID" value="<?= $userList["USER_ID"] ?>" hidden>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Новый пароль:</label>
			<div class="col-sm-10">
				<div class="form-group">
					<input type="password" name="pass1" class="form-control" placeholder="Пароль" value="">
				</div>
				<div class="form-group">
					<input type="password" name="pass2" class="form-control" placeholder="Повторить пароль" value="">
				</div>
			</div>
		</div>

		<? if ($userList["editPass"]) : ?>
			<div class="form-group row bg-danger text-light">
				<div class="col-sm-6"><?= $userList["editPass"] ?></div>
			</div>
		<? endif ?>

		<div class="form-group">
			<input type="submit" name="btn_pass" class="btn btn-primary" value="Изменить пароль">
		</div>
	</form>
</div>

<?
// var_dump($userList);
?>