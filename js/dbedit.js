console.info("dbedit.js - подключен.");

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

async function deleteRow(elem) {
	let data = new FormData();
	data.append("ajax", "Y");
	data.append("delete", "Y");
	data.append("idRow", elem.getAttribute("idRow"));
	let response = await fetch('', {
		method: 'POST',
		body: data
	});
	elem.parentElement.parentElement.remove();
}

async function editRow(elem) {
	let data = new FormData();
	data.append("ajax", "Y");
	data.append("editRow", "Y");

	let arrElemRow = {};
	let row = elem.parentElement.parentElement;
	for (var i = 0; i < row.children.length; i++) 
	{
		if(row.children[i].hasAttribute("colName"))
		{
			arrElemRow[row.children[i].querySelector("input").getAttribute("name")] = row.children[i].querySelector("input").value;
		}
	}
	data.append("arrElemRow", JSON.stringify(arrElemRow));

	let response = await fetch('', 
	{
		method: 'POST',
		body: data
	});
	let result = await response.text();
	if(result == "Y")
	{
		console.info("Запись изменена.");
	}
	else
	{
		alert("Ошибка записи!");
		console.error("Ошибка на сервере: ",result);
	}
	

	for (var i = 0; i < row.children.length; i++) {
		
		if(row.children[i].hasAttribute("colName"))
		{
			let valueElem = row.children[i].innerHTML;
			row.children[i].innerHTML = arrElemRow[row.children[i].getAttribute("colName")];
		}
	}
	elem.hidden=true;
	row.querySelector('[name="enableEditRow"]').hidden=false;
	row.querySelector('[name="delleteRow"]').hidden=false;
}

async function enableEditRow(elem) {
	let row = elem.parentElement.parentElement;
	for (var i = 0; i < row.children.length; i++) {
		
		if(row.children[i].hasAttribute("colName"))
		{
			let valueElem = row.children[i].innerHTML;
			row.children[i].innerHTML = '<input type="text" name="'+row.children[i].getAttribute("colName")+'" class="form-control" placeholder="ИД" value="'+valueElem.trim()+'">';
		}
	}
	elem.hidden=true;
	row.querySelector('[name="delleteRow"]').hidden=true;
	row.querySelector('[name="editRow"]').hidden=false;
}