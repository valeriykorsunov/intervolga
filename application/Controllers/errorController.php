<?php

namespace Controllers;

use System\View;

/**
 * Главный контроллер приложения
 *
 */
class errorController
{
	/**
	 * Действие отвечающее за отображение главной
	 * страницы портала
	 *
	 */
	public function action404()
	{
		// Рендер главной страницы портала
		View::render('404');
	}
}
