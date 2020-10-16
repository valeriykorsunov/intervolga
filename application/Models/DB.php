<?

namespace Models;

use PDO;

class DB
{
	private
		$DBHost = "localhost",
		$DBLogin = "7v2m4jsuser",
		$DBPassword = 'MWAs=(gap]s6B4H',
		$DBName = "7v2m4jsdb",
		$DBCharset = 'utf8',
		$DBDebug = false;

		private $link;


	function __construct()
	{
		$this->link = mysqli_connect(
			$this->DBHost,  /* Хост, к которому мы подключаемся */
			$this->DBLogin,       /* Имя пользователя */
			$this->DBPassword,   /* Используемый пароль */
			$this->DBName /* База данных для запросов по умолчанию */
		);
		if (!$this->link)
		{
			printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
			exit;
		}
	}

	function __destruct()
	{
		/* Закрываем соединение */
		mysqli_close($this->link);
	}

	function textSqlQuery(string $text)
	{
		if ($result = $this->link->query($text))
		{
			if(gettype($result) == "object")
			{
				$result = $result->fetch_all();
				mysqli_free_result($result);
			}
			
			if(gettype($result) != "array")
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
			$arows = $result->fetch_all();

			/* Освобождаем используемую память */
			mysqli_free_result($result);
		}
		return $arows;
	}

	function createTable()
	{
		$this->link->query(
			'CREATE TABLE cities (
				id INT AUTO_INCREMENT PRIMARY KEY,
				name CHAR(128)
			)'
		);
	}

	function tableDrop($nameTable)
	{
		$this->link->query('DROP TABLE '.$nameTable.';');
	}
}
