<?

namespace Models;

use PDO;

class DB
{
	private
		$DBHost = "127.0.0.1",
		$DBLogin = "mypro_mypro",
		$DBPassword = 'g*NIeu[dHYz0',
		$DBName = "mypro_taskinter",
		$DBCharset = 'utf8';
	public
		$link;

	function __construct()
	{
		$dsn = "mysql:host=$this->DBHost; dbname=$this->DBName; charset=$this->DBCharset;";
		$this->link = new PDO(
			$dsn,
			$this->DBLogin,
			$this->DBPassword,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
		);
	}
}
