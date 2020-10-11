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

	function getSqlText(string $text)
	{
		if ($result = $this->link->query($text))
		{
			$result = $result->fetch_all();
			return $result;
			/* Освобождаем используемую память */
			mysqli_free_result($result);
		}
		return false;
	}

	function getAllTable()
	{
		if ($result = $this->link->query('SHOW TABLES FROM 7v2m4jsdb;'))
		{
			$rows = mysqli_num_rows($result);
			\var_dump($result->fetch_all());
			if($rows == 0)
			{
				mysqli_free_result($result);
				$this->link->query(
					'CREATE TABLE cities (
						id INT AUTO_INCREMENT PRIMARY KEY,
						name CHAR(128)
					)'
				);
			}
			/* Освобождаем используемую память */
			mysqli_free_result($result);
		}
	}
}
