<?
namespace Models;

Use PDO;

class DB 
{
	private
		$DBHost = "127.0.0.1",
		$DBLogin = "7v2m4jsuser",
		$DBPassword = 'MWAs=(gap]s6B4H',
		$DBName = "7v2m4jsdb",
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