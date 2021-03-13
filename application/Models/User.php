<?

namespace Models;
use Models\DB;
use PDOException;

class User 
{
	function __construct()
	{
		
	}

	function getUserList()
	{
		$db = new DB;
		$query = $db->link->prepare('SELECT * FROM users ');
		$query->execute();
		
		$arows = $query->fetchAll();

		return $arows;
	}

	/**
	 * Пользователь по ID
	 * 
	 */
	function getUserByID(int $UserID)
	{
		$db = new DB;
		$query = $db->link->prepare('SELECT * FROM users WHERE USER_ID = ?');
		$query->execute(array($UserID));
		$userDataDB = $query->fetchAll();
		return array(
			"USER_ID" => $userDataDB[0]['USER_ID'],
			"LOGIN" => $userDataDB[0]['LOGIN'],
			"PASSWORD_HASH" => $userDataDB[0]['PASSWORD_HASH'],
			"NAME" => $userDataDB[0]['NAME'],
			"USER_GROUP" => $userDataDB[0]['USER_GROUP'],
		);
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @param mixed $details 
	 * @return bool 
	 * @throws PDOException 
	 */
	function editRecord($id, $details)
	{
		// $details - реквезиты которые следует изменить
		$db = new DB;
		$queryText = 'UPDATE users SET ';
		$queryText .= ' LOGIN = ? ,';
		$queryText .= ' NAME = ? ,';
		$queryText .= ' USER_GROUP = ?';

		// $queryText .= ' PASSWORD_HASH = ? ';

		$queryText .= ' WHERE USER_ID = ? ';

		$query = $db->link->prepare($queryText);
		
		return $query->execute(array($details["login"], $details["name"], $details["usgroup"], $id));
	}

	/**
	 * 
	 * @param mixed $idUser 
	 * @param mixed $pass1 
	 * @param mixed $pass2 
	 * @return string|false 
	 * @throws PDOException 
	 */
	function editPass($idUser, $pass1, $pass2)
	{
		if($pass1 === $pass2 && $pass1 != "")
		{
			$db = new DB;
			$queryText = 'UPDATE users SET ';
			$queryText .= ' PASSWORD_HASH = :pass_hash ';
			$queryText .= ' WHERE USER_ID = :idUser ';
			$values = array(
				'pass_hash' => password_hash($pass1, PASSWORD_BCRYPT),
				'idUser' => $idUser
			);
			$query = $db->link->prepare($queryText);
			if( $query->execute($values) )
			{
				return "пароль изменен.";
			}
			return false;
		}
		return "пароли не совпадают!";
	}
}