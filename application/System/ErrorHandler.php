<?

namespace System;

use Exception;

class ErrorHandler
{
	public function register()
	{
		set_exception_handler([$this, 'exceptionErrorHandler']);
	}

	public function exceptionErrorHandler( $e) //Exception
	{
		//\var_dump($e);
		if($e->getCode() == 404){
			App::run("error","404", false);
			echo $e->getMessage();
			return true;
		}
		return true;
	}

}
