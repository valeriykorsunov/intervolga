<div class="container">
	<h1>snake_array !!</h1>
	<?
//		var_dump($arResult["snake"]);
	?>
	<?foreach($arResult["snake"] as $str):?>
		<?foreach($str as $elem):?>
			<?echo" ".$elem;?>
		<?endforeach?>
		<br>
	<?endforeach?>
	<br>
	<table>
		<tr>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
		</tr>
		<tr>
			<td>5</td>
			<td>6</td>
			<td>7</td>
			<td>8</td>
		</tr>
		<tr>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
		</tr>
	</table>
</div>
