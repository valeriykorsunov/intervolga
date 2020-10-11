<div class="container">
	<h1>Управление БД</h1>
	<form action="" method="post">
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Текст SQL запроса:</label>
			<textarea class="form-control" name="sqlQuery" rows="3"><?=$_POST["sqlQuery"]?></textarea>
		</div>

		<div class="form-group">
			<input type="submit" name="btn" class="btn btn-primary" value="Отправить">
		</div>
	</form>
</div>

<div class="container">
	<?// var_dump($arResult); ?>
</div>