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
						<td colName="<?=$colName?>">
							<?= $row[$colName] ?>
						</td>
					<? endforeach ?>
					<td>
						<input onclick="enableEditRow(this)" name="enableEditRow" type="submit" class="btn btn-primary" value="Вкл.ред.">
						<input onclick="editRow(this)" name="editRow" type="submit" class="btn btn-primary" value="Изменить" hidden>

						<input name="delleteRow" type="submit" class="btn btn-danger" value="Удалить"
							onclick="deleteRow(this);"	
							idRow="<?=$row[0]["id"]?>">
					</td>
				</tr>
			<? endforeach ?>
			<tr>
				<form action="?table=<?= $_GET["table"] ?>" method="post">
				<!-- <th scope="row">
					+
				</th> -->
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
