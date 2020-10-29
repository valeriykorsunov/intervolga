<?

namespace System;

use Exception;

class ErrorHandler
{
	public function register()
	{
		set_exception_handler([$this, 'exceptionErrorHandler']);
	}

	public function exceptionErrorHandler($e) //Exception
	{
		//var_dump($e);
		if ($e->getCode() == 404)
		{
			App::run("error", "404", false);
			echo $e->getMessage();
			return true;
		}
		else
		{ // делать редиректна ту страницу (любую, можно на 404) с пост параметрами описание ошибки
			//\var_dump( $e);
			echo "<br> Сообщение: ".$e->getMessage();
			echo "<br> Файл: ".$e->getFile();
			echo "<br> Строка: ".$e->getLine();
		}
		return \true;
	}
}
