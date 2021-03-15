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
						<? echo $user["USER_ID"]; ?>
					</th>
					<td>
						<?= $user["LOGIN"] ?>
					</td>
					<td>
						<?= $user["NAME"] ?>
					</td>
					<td>
						<?= $user["USER_GROUP"] ?>
					</td>
					<td><a style="color:blue;" href="/user/edituser/?user=<?= $user["USER_ID"] ?>">Редактировать</a></td>
					<td>
						<? if ($user["USER_GROUP"] != '777') : ?>
							<a style="color: red;" href="?deletUser=<?= $user["id"] ?>">Удалить</a>
						<? endif ?>
					</td>
				</tr>
			<? endforeach ?>
		</tbody>
	</table>
</div>

