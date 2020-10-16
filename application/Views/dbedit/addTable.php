<div class="container">
	<h2>Добавить таблицу</h2>
	<form action="" method="post">
		<div class="row">
			<div class="form-group col-sm-4">
				<input type="text" name="" class="form-control" placeholder="Имя таблицы" value="">
			</div>
		</div>

		<div class="row">
			<div class="form-group col-sm-2">
				<input type="text" name="" class="form-control" placeholder="ИД" value="id">
			</div>
			<div class="form-group col-sm-2">
				<input type="text" name="" class="form-control" placeholder="тип данных" value="init">
			</div>
			<div class="form-group col-sm-6">
				<input type="text" name="" class="form-control" placeholder="Атрибуты" value="PRIMARY KEY AUTO_INCREMENT">
			</div>
			<div class="form-group col-sm-1">
				<input onclick="deleteColunt(this);" type="submit" class="btn btn-danger" value="Удалить">
			</div>
		</div>

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

<?
/*
CREATE TABLE Customers
(
    Id INT,
    Age INT,
    FirstName VARCHAR(20),
    LastName VARCHAR(20)
);
*/
?>