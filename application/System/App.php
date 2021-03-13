<?php

namespace System;

use Models\Session;

/**
 * Главный класс приложения
 *
 * @return void
 */
class App
{
	
	/**
	 * Запуск приложения
	 * 
	 * @throws \ErrorException если Controller или action не существует
	 */
	public static function run($controller = "main", $action = "index", $path = true)
	{
		$session = new Session;
		$session->userParamAutoriz();

		if ($path)
		{
			// Получаем URL запроса
			$path = $_SERVER['REQUEST_URI'];

			// Разбиваем URL на части
			$pathParts = explode('/', $path);
		}

		if ($pathParts[1])
		{
			$controller = $pathParts[1];
		}
		if ($pathParts[2])
		{
			$action = $pathParts[2];
		}

		$nameController = $controller;
		$controller = 'Controllers\\' . $controller . 'Controller';
		if (!class_exists($controller))
		{
			throw new \ErrorException('Controller "'.$controller.'" не существует', 404);
		}

		
		$objController = new $controller($nameController);
		if(!$session->checkAccess($objController->getGroupsWithAccess()))
		{
			return App::accessDenied();
		}

		$action = 'action'.ucfirst($action);
		if (!method_exists($objController, $action))
		{
			throw new \ErrorException('action "' . $action . '" не существует', 404);
		}
		$objController->$action();
	}

	static function accessDenied()
	{
		App::run("user", "login", false);
		return \false;
	}
}
