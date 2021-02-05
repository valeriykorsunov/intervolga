<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>id</th>
				<th>Логин</th>
				<th>Имя</th>
				<th>Группа</th>
				<th style="width: 50px;"></th>
				<th style="width: 40px;"></th>
			</tr>
		</thead>
		<tbody>
			<?
			$i = 0;
			foreach ($this->vData["userList"] as $user) : ?>
				<tr>
					<th scope="row">
						<? echo $user["id"]; ?>
					</th>
					<td>
						<?= $user["login"] ?>
					</td>
					<td>
						<?= $user["name"] ?>
					</td>
					<td>
						<?= $user["usgroup"] ?>
					</td>
					<td><a style="color:blue;" href="/dbedit/editUser/?idUser=<?= $user["id"] ?>">Редактировать</a></td>
					<td>
						<? if ($user["usgroup"] != '777') : ?>
							<a style="color: red;" href="?deletUser=<?= $user["id"] ?>">Удалить</a>
						<? endif ?>
					</td>
				</tr>
			<? endforeach ?>
		</tbody>
	</table>
</div>

<?
//var_dump($this->vData["userList"]);
?>