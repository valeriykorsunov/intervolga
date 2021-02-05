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
		$query = $db->link->prepare('SELECT * FROM users WHERE login = ?');
		$query->execute(array($login));
		
		$userDataDB = $query->fetchAll();

		if($userDataDB[0]["pass"] ==  $user["PASSWORD"])
		{
			$_SESSION["SESS_AUTH"] = array(
				"AUTHORIZED" => \true,
				"USER_ID" => $userDataDB[0]["id"],
				"LOGIN" => $userDataDB[0]["login"],
				"PASSWORD_HASH"=>"",
				"NAME" => $userDataDB[0]["name"],
				"ADMIN" => ($userDataDB[0]["usgroup"] == 777 ? \true : \false),
				"USER_GROUP" => $userDataDB[0]["usgroup"]
			);
			
			return true;
		}
		else
		{
			return false;
		}
	}

	// проверить доступ по группе
	function checkAccess(array $appUserGroups)
	{
		$userGroups = array();
		
		if($_SESSION["SESS_AUTH"]["AUTHORIZED"])
		{
			// если администратор то вернуть return true;
			return \true;	
		}
		else
		{
			$userGroups = array(0);
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

		if($_SESSION["SESS_AUTH"])
		{
			define("USER", $_SESSION["SESS_AUTH"]);
		}
	}

}