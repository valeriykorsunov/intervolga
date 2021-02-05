<?

namespace Models;
use Models\DB;

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
}