<?php

namespace Controllers;

use System\View;
use Models\News;

/**
 * Главный контроллер приложения
 *
 */
class homeController extends Controller
{
	public function actionIndex()
	{
		// Рендер главной страницы портала
		View::render('index');
	}
}
