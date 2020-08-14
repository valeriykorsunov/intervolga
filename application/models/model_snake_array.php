<?php

class Model_Snake_array extends Model
{
	public function get_data()
	{
		$arData = array();
		$m = 4;
		$n = 3;
		// просто наполнить массив числами
		$num = 0;

		for ($i = 1; $i <= $n; $i++) 
		{
			for ($j = 1; $j <= $m; $j++) 
			{
				$arData[$i][] = $num++;
			}
		}

		return $arData;
	}
}
