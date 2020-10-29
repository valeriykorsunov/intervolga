<div class="container">
	<h2>Добавить таблицу</h2>
	<form action="" method="post">
		<div class="row">
			<div class="form-group col-sm-4">
				<input type="text" name="tableName" class="form-control" placeholder="Имя таблицы" value="<?= $_POST["tableName"] ?>">
			</div>
		</div>

		<? if ($_POST["name"]) : ?>
			<? foreach ($_POST["name"] as $key => $name) : ?>
				<div class="row">
					<div class="form-group col-sm-2">
						<input type="text" name="name[]" class="form-control" placeholder="ИД" value="<?= $_POST["name"][$key] ?>">
					</div>
					<div class="form-group col-sm-2">
						<input type="text" name="typeDate[]" class="form-control" placeholder="тип данных" value="<?= $_POST["typeDate"][$key] ?>">
					</div>
					<div class="form-group col-sm-6">
						<input type="text" name="attribute[]" class="form-control" placeholder="Атрибуты" value="<?= $_POST["attribute"][$key] ?>">
					</div>
					<div class="form-group col-sm-1">
						<input onclick="deleteColunt(this);" type="submit" class="btn btn-danger" value="Удалить">
					</div>
				</div>
			<? endforeach ?>
		<? else : ?>
			<div class="row">
				<div class="form-group col-sm-2">
					<input type="text" name="name[]" class="form-control" placeholder="ИД" value="id">
				</div>
				<div class="form-group col-sm-2">
					<input type="text" name="typeDate[]" class="form-control" placeholder="тип данных" value="INT">
				</div>
				<div class="form-group col-sm-6">
					<input type="text" name="attribute[]" class="form-control" placeholder="Атрибуты" value="AUTO_INCREMENT PRIMARY KEY">
				</div>
				<div class="form-group col-sm-1">
					<input onclick="deleteColunt(this);" type="submit" class="btn btn-danger" value="Удалить">
				</div>
			</div>
		<? endif; ?>

		<div class="form-group" id="addElem">
			<input onclick='addColumn(this);' type="submit" class="btn btn-success" value="+ Добавить">
		</div>

		<div class="row">
			<div class="col-sm-1">
				<input type="submit" name="btn" class="btn btn-primary" value="Создать">
			</div>
		</div>
	</form>
</div>

<div class="container">
	<? echo $this->vData["message"]; ?>
	<p style="color: red;">
		<? if ($this->vData["error"]) : ?>
			Таблица не созданна:<br>
		<? endif ?>
		<? echo $this->vData["error"]; ?>
	</p>
</div>

<div class="container">
	<h2>Подсказки:</h2>

</div>