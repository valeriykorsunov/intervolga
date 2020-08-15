<?php

class Model_Snake_array extends Model
{
	public function get_data()
	{
		$arData = array();
		$n = 5; // строка
		$m = 5; // столбец
		// просто наполнить массив числами
		$num = 0;
		for ($i = 1; $i <= $n; $i++) 
		{
			for ($j = 1; $j <= $m; $j++) 
			{
				$arData[$i][$j] = $num++;
			}
		}

		// переобразовать в одномерный массив
		$lineArray = $this->lineArray($arData);
		$arrN = range(1, $n);
		$arrM = range(1, $m);

		/** Наполнение нового массива */
		// 1-я строка
		$str = array_shift($arrN);
		foreach($arrM as $val)
		{
			$resultArr[$str][$val] = array_shift($lineArray);
		}
		// последний столбец
		$col = array_pop($arrM);
		foreach($arrN as $val)
		{
			$resultArr[$val][$col] = array_shift($lineArray);
		}
		// последня строка + заполнеие в обратном порядке
		$str = array_pop($arrN);
		$rsortArrM = $arrM;
		krsort($rsortArrM);
		foreach($rsortArrM as $val)
		{
			$resultArr[$str][$val] = array_shift($lineArray);
		}
		// первый столбец
		$col = array_shift($arrM);
		$rsortArrN = $arrN;
		krsort($rsortArrN);
		foreach($rsortArrN as $val)
		{
			$resultArr[$val][$col] = array_shift($lineArray);
		}
		/**конец наполнения нового массива */

		return $arData;
	}

	function lineArray($array)
	{
		$lineArray = array();
		foreach($array as $arTwo)
		{
			foreach ($arTwo as $value) 
			{
				$lineArray[] = $value;
			}
		}
		
		return $lineArray;
	}
}
