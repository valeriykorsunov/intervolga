console.log("dbedit.js - подключен без гритических ошибок");

function addColumn(elem) {
	event.preventDefault();

	let column = '<div class="row">'
		+ '<div class="form-group col-sm-2">'
		+ '<input type="text" name="name[]" class="form-control" placeholder="Название столбца" value="">'
		+ '</div>'

		+ '<div class="form-group col-sm-2">'
		+ '<input type="text" name="typeDate[]" class="form-control" placeholder="Тип данных" value="init VARCHAR(20) TEXT MEDIUMTEXT BOOL FLOAT DATE TIME YEAR TIMESTAMP">'
		+ '</div>'

		+ '<div class="form-group col-sm-6">'
		+ '<input type="text" name="attribute[]" class="form-control" placeholder="Атрибуты" value="UNIQUE NOT NULL DEFAULT 9 CHECK(Age >0 AND Age < 100)">'
		+ '</div>'

		+ '<div class="form-group col-sm-1">'
		+ '<input onclick="deleteColunt(this);" type="submit" class="btn btn-danger" value="Удалить">'
		+ '</div>'

		+ '</div>';
	elem.parentElement.insertAdjacentHTML('beforebegin', column);
}

function deleteColunt(elem) {
	event.preventDefault();
	elem.closest('.row').remove();
}