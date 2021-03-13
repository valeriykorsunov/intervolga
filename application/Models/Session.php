<?

namespace Models;
use Models\DB;

class Session 
{
	function __construct()
	{
		session_start();
	}

	// авторизация - проверка логина и пароля, завпись пользователя в сессию.
	function auth()
	{
		$user = array(
			"LOGIN" => $_POST['login'],
			"PASSWORD" => $_POST['password']
		);

		$db = new DB;

		$login = $user["LOGIN"];
		$query = $db->link->prepare('SELECT * FROM users WHERE LOGIN = ?');
		$query->execute(array($login));
		
		$userDataDB = $query->fetchAll();

		if( password_verify($user["PASSWORD"], $userDataDB[0]["PASSWORD_HASH"]) )
		{
			$_SESSION["SESS_AUTH"] = array(
				"AUTHORIZED" => \true,
				"USER_ID" => $userDataDB[0]["USER_ID"],
				"LOGIN" => $userDataDB[0]["LOGIN"],
				"PASSWORD_HASH"=> $userDataDB[0]["PASSWORD_HASH"],
				"NAME" => $userDataDB[0]["NAME"],
				"ADMIN" => ($userDataDB[0]["USER_GROUP"] == 777 ? \true : \false),
				"USER_GROUP" => $userDataDB[0]["USER_GROUP"]
			);
			
			return true;
		}
		else
		{
			return false;
		}
	}

	// проверить доступ по группе
	static function checkAccess(array $appUserGroups)
	{
		$userGroups = array(0);
		
		if($_SESSION["SESS_AUTH"]["AUTHORIZED"])
		{
			$userGroups = array_merge($userGroups , explode(",", $_SESSION["SESS_AUTH"]["USER_GROUP"]) );
		}

		if (array_intersect($userGroups, $appUserGroups))
		{
			return \true;	
		}

		return \false;
	}

	function userParamAutoriz()
	{
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$this->auth();
		}

		// if($_SESSION["SESS_AUTH"])
		// {
			define("USER", $_SESSION["SESS_AUTH"]);
		// }
	}

}