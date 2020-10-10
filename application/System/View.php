<?php

namespace System;

/**
 * Главный класс реализующий функционал отображения
 * представлений
 *
 */
class View
{
	/**
	 * @param string $path
	 * @param array $data
	 * @throws \ErrorException
	 */
	public static function render(string $template, string $path, array $data = [])
	{
		/**
		 * Получаем путь, где лежат все представления
		 */
		$fullPathView = __DIR__ . '/../Views/' . $path . '.php';
		
		/**
		 * Если представление не было найдено, выбрасываем исключение
		 */
		if (!file_exists($fullPathView))
		{
			throw new \ErrorException('view cannot be found');
		}

		/**
		 * Если данные были переданы, то из элементов массива
		 * создаются переменные, которые будут доступны в представлении
		 */
		if (!empty($data))
		{
			foreach ($data as $key => $value)
			{
				$$key = $value;
			}
		}

		$fullTemplatePath = __DIR__ . '/../Views/templates/' . $template . '.php';
		
		// Отображаем шаблон
		include($fullTemplatePath);
		// Отображаем представление
		// include($fullPath);
	}
}
