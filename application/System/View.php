<?php

namespace System;

/**
 * Главный класс реализующий функционал отображения
 * представлений
 *
 */
class View
{
	public $arJsFile = array(),
			$vData = array(); // viewData - сократил для удобства записи.
	protected 
			$templateViwe = "main";

	public function render(string $path)
	{
		$template = $this->templateViwe;
		/**
		 * Получаем путь, где лежат все представления
		 */
		$fullPathView = __DIR__ . '/../Views/' . $path . '.php';
		
		/**
		 * Если представление не было найдено, выбрасываем исключение
		 */
		if (!file_exists($fullPathView))
		{
			throw new \ErrorException($fullPathView.' - view cannot be found');
		}

		/**
		 * Если данные были переданы, то из элементов массива
		 * создаются переменные, которые будут доступны в представлении
		 */
		/*
		if (!empty($arResult))
		{
			foreach ($arResult as $key => $value)
			{
				$$key = $value;
			}
		}
		*/

		$fullTemplatePath = __DIR__ . '/../Views/templates/' . $template . '.php';
		
		// Отображаем шаблон
		include($fullTemplatePath);
		// Отображаем представление
		// include($fullPath);
	}

	function setTemplateViwe(string $str)
	{
		$this->templateViwe = $str;
	}

}
