<?

namespace System;

use Exception;

class ErrorHandler
{
	public function register()
	{
		set_error_handler([$this, 'errorHandler']);
		set_exception_handler([$this, 'exceptionErrorHandler']);
	}

	public function exceptionErrorHandler(Exception $e)
	{
		if($e->getCode() == 404){
			//App::run("error","404", false);
			//(new \Controllers\errorController)->action404();
			echo $e->getMessage();
			return true;
		}
		return false;
	}

}
