<?php

namespace Controllers;

use System\View;

/**
 * Главный контроллер приложения
 *
 */
class errorController extends Controller
{
	/**
	 * Действие отвечающее за отображение главной
	 * страницы портала
	 */
	public function action404()
	{
		// Рендер главной страницы портала
		View::render($this->templateViwe, $this->dirViwe.'404');
	}
}
