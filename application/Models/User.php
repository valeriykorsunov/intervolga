<?

namespace Models;

class User 
{
	static public $auth = false;

	function __construct()
	{
		if ($this->auth())
		{
			User::$auth = true;
		}
		else
		{
			User::$auth = false;
		}
	}

	static function auth()
	{
		session_start();
		/*
		* Для простоты, в нашем случае, проверяется равенство сессионной переменной admin прописанному
		* в коде значению — паролю. Такое решение не правильно с точки зрения безопасности.
		* Пароль должен храниться в базе данных в захешированном виде, но пока оставим как есть.
		*/
		if ( $_SESSION['admin'] == "12345" )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}