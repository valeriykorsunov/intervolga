<div class="container">
	<form class="row" method="POST">
		<div class="form-group col-sm-2">
			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Кол-во строк" value="10">
		</div>

		<div class="form-group col-sm-2">
			<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Кол-во столбцов" value="20">
		</div>
		<div class="col-sm-1">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>
<div class="container">
	<div class="scroll-table">
		<table class="snake" style="width: 100%;">
			<? foreach ($arResult["snake"] as $str) : ?>
				<tr>
					<? foreach ($str as $elem) : ?>
						<td style="background-color: <?= $elem["color"] ?>;">
							<? echo $elem[0]; ?>
						</td>
					<? endforeach ?>
				</tr>
			<? endforeach ?>
		</table>
	</div>
</div>

<div class="container">
	<div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Внимание!</strong> Что-то пошло не так.
	</div>
</di>