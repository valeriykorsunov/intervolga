<?
class Route
{
	static $auth;

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		if(Route::auth()==false)
		{
			$controller_name = 'login';
			$action_name = 'index';
		}


		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else // 404
		{
			$controller_name = 'controller_404';
			Route::ErrorPage404();
			return;
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}
	
	static function ErrorPage404()
	{
		// подцепляем файл с классом контроллера
		include 'application/controllers/controller_404.php';
		$controller = new Controller_404;
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");

		$controller->action_index();
	}
	
	static function auth()
	{
		session_start();
		
		/*
		Для простоты, в нашем случае, проверяется равенство сессионной переменной admin прописанному
		в коде значению — паролю. Такое решение не правильно с точки зрения безопасности.
		Пароль должен храниться в базе данных в захешированном виде, но пока оставим как есть.
		*/
		if ( $_SESSION['admin'] == "12345" )
		{
			Route::$auth = true;
		}
		else
		{
			Route::$auth = false;
		}
		return Route::$auth;
	}
	
}