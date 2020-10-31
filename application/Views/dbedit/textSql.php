<div class="container">
<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Название таблиы</th>
				<th style="width: 50px;"></th>
				<th style="width: 40px;"></th>
			</tr>
		</thead>
		<tbody>
			<?
			$i=0;
			foreach($this->vData["allTable"] as $row):?>
			<tr>
				<th scope="row">
					<? echo ++$i; ?>
				</th>
				<td>
					<?=$row?>
				</td>
				<td><a style="color:blue;" href="/dbedit/editTable/?table=<?=$row?>">Редактировать</a></td>
				<td><a style="color: red;" href="?tableDrop=<?=$row?>">Удалить</a></td>
			</tr>
			<?endforeach?>
		</tbody>
	</table>
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