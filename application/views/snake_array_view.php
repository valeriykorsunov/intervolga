<div class="container">
	<h1>snake_array !!</h1>
	<table class="snake">
		<? foreach ($arResult["snake"] as $str) : ?>
			<tr>
				<? foreach ($str as $elem) : ?>
					<td style="background-color: <?=$elem["color"]?>;">
						<? echo $elem[0]; ?>
					</td>
				<? endforeach ?>
			</tr>
		<? endforeach ?>
	</table>
</div>