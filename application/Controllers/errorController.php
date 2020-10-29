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
		$this->view->render($this->templateViwe, $this->dirViwe.'404');
	}
	public function actionError()
	{
		// Рендер главной страницы портала
		$this->view->render($this->templateViwe, $this->dirViwe.'error');
	}
}
