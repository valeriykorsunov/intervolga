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
</div>

<?  //var_dump($this->vData) ?>