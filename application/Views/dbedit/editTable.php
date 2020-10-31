<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<? foreach ($this->vData["Table"]["columns"] as $colName) : ?>
					<th><?= $colName ?></th>
				<? endforeach ?>
				<th>Действие</th>
				<!-- <th style="width: 50px;"></th>
				<th style="width: 40px;"></th> -->
			</tr>
		</thead>
		<tbody>
			<?
			foreach ($this->vData["Table"]["table_str"] as $row) : ?>
				<tr>
					<? foreach ($this->vData["Table"]["columns"] as $colName) : ?>
						<td>
							<?= $row[$colName] ?>
						</td>
					<? endforeach ?>
					<td>
						<!-- <a style="color:blue;" href="/dbedit/editTable/?table=<?= $row ?>">Изменить</a> <br>  -->
						<input name="editRow" type="submit" class="btn btn-primary" value="Изменить">

						<input name="delleteRow" type="submit" class="btn btn-danger" value="Удалить"
							onclick="deleteRow(this);"	
							idRow="<?=$row[0]["id"]?>">
						<!-- <a style="color: red;" href="?tableDrop=<?= $row ?>">Удалить</a> -->
					</td>
				</tr>
			<? endforeach ?>
			<tr>
				<form action="?table=<?= $_GET["table"] ?>" method="post">
				<th scope="row">
					+
				</th>
				<? foreach ($this->vData["Table"]["columns"] as $colName) : ?>
					<td>
						<input type="text" name="column[<?=$colName?>]" class="form-control" value="">
					</td>
				<? endforeach ?>
				<td>
					<input name="addEntry" type="submit" class="btn btn-success" value="+ Добавить">
				</form>
			</tr>
		</tbody>
	</table>
</div>
