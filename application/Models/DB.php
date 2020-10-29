<?

namespace Models;

use PDO;

/**
 * 
 * @package Models
 * 
 * не использую PDO т.к. работает на сервере с bitrix vm.
 */

class DB
{
	private
		$DBHost = "127.0.0.1",
		$DBLogin = "7v2m4jsuser",
		$DBPassword = 'MWAs=(gap]s6B4H',
		$DBName = "7v2m4jsdb",
		$DBCharset = 'utf8',
		$DBDebug = false;

	private $link;


	function __construct()
	{
		$dsn = "mysql:host=$this->DBHost; dbname=$this->DBName; charset=$this->DBCharset;";
		$this->link = new PDO($dsn, $this->DBLogin, $this->DBPassword);

		// $this->link = mysqli_connect(
		// 	$this->DBHost,  /* Хост, к которому мы подключаемся */
		// 	$this->DBLogin,       /* Имя пользователя */
		// 	$this->DBPassword,   /* Используемый пароль */
		// 	$this->DBName /* База данных для запросов по умолчанию */
		// );
		// if (!$this->link)
		// {
		// 	printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
		// 	exit;
		// }

		// $this->link->set_charset("utf8");
	}

	function __destruct()
	{
		/* Закрываем соединение */
		//mysqli_close($this->link);
	}

	function textSqlQuery(string $text)
	{
		if ($result = $this->link->query($text))
		{
			if (gettype($result) == "object")
			{
				$result = $result->fetch_all();
				mysqli_free_result($result);
			}

			if (gettype($result) != "array")
			{
				$result = array($result);
			}
			return $result;
		}

		return array();
	}

	function getAllTable()
	{
		$arows = array();
		if ($result = $this->link->query('SHOW TABLES FROM 7v2m4jsdb;'))
		{
			$arows = $result->fetchAll(PDO::FETCH_COLUMN);
		}
		return $arows;
	}

	function createTable($tableName, $arColName = array(), $arColTypeDate = array(), $arColAttribute = array())
	{
		foreach ($arColName as $key => $colName)
		{
			$arCol[] = "$colName $arColTypeDate[$key] $arColAttribute[$key]";
		}

		$query = "CREATE TABLE $tableName (" . implode(",", $arCol) . ")";

		if (!$this->link->query($query))
		{
			return $this->link->error_list;
		}
		return \true;
	}

	function tableDrop($nameTable)
	{
		$this->link->query('DROP TABLE ' . $nameTable . ';');
	}

	function getTableDada()
	{
		// $stmt = $this->link->stmt_init();
		// $stmt->prepare("SELECT * FROM ?");
		// $stmt->bind_param( "s", $_GET["table"]);
		// $result = $stmt->get_result();
		// $stmt->execute();
		// $stmt->close();

		// \var_dump($result);

	}
}
