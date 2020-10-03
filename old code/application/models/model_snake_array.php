<?php

class Model_Snake_array extends Model
{
	public function get_data()
	{
		$arData = array();
		$n = 10; // строка
		$m = 20; // столбец
		// просто наполнить массив числами
		$num = 1;
		for ($i = 1; $i <= $n; $i++)
		{
			for ($j = 1; $j <= $m; $j++)
			{
				$arData[$i][$j] = $num++;
			}
		}

		// переобразовать в одномерный массив
		$lineArray = $this->lineArray($arData);
		// массивы строк и столбцов
		$arrN = range(1, $n);
		$arrM = range(1, $m);

		while (count($lineArray) > 0)
		{
			$randomcolor = '#' . dechex(rand(256, 16777215)); // украсить сассив 

			/** Наполнение массива по кругу */
			// 1-я строка
			$str = array_shift($arrN);
			foreach ($arrM as $val)
			{
				$resultArr[$str][$val][0] = array_shift($lineArray);
				$resultArr[$str][$val]["color"] = $randomcolor;
			}
			// последний столбец
			$col = array_pop($arrM);
			foreach ($arrN as $val)
			{
				$resultArr[$val][$col][0] = array_shift($lineArray);
				$resultArr[$val][$col]["color"] = $randomcolor;
			}
			// последня строка + заполнеие в обратном порядке
			$str = array_pop($arrN);
			$rsortArrM = $arrM;
			krsort($rsortArrM);
			foreach ($rsortArrM as $val)
			{
				$resultArr[$str][$val][0] = array_shift($lineArray);
				$resultArr[$str][$val]["color"] = $randomcolor;
			}
			// первый столбец
			$col = array_shift($arrM);
			$rsortArrN = $arrN;
			krsort($rsortArrN);
			foreach ($rsortArrN as $val)
			{
				$resultArr[$val][$col][0] = array_shift($lineArray);
				$resultArr[$val][$col]["color"] = $randomcolor;
			}
			/**конец наполнения нового массива */
		}

		// Так как массив отсортирован сечас в порядке наполнения
		// делаю правильную сортировка
		foreach ($resultArr as $key => $str)
		{
			ksort($resultArr[$key]);
		}
		return $resultArr;
	}

	function lineArray($array)
	{
		$lineArray = array();
		foreach ($array as $arTwo)
		{
			foreach ($arTwo as $value)
			{
				$lineArray[] = $value;
			}
		}

		return $lineArray;
	}
}
