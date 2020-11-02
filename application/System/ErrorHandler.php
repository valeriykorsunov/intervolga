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
		{
			$_POST["ERROR"] = array(
				"FILE" => $e->getFile(),
				"LINE" => $e->getLine(),
				"MESSAGE" => $e->getMessage()
			);
			if ($_POST["ajax"] == "Y")
			{
				\print_r($_POST["ERROR"]);
			}
			else
			{
				App::run("error", "error", false);
			}
		}
		return \true;
	}
}
