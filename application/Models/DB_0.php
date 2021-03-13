<?

namespace Models;

use PDO;

/**
 * 
 * @package Models
 * 
 * не использую PDO т.к. работает на сервере с bitrix vm.
 */

class DB_0
{
	private
		$DBHost = "127.0.0.1",
		$DBLogin = "7v2m4jsuser",
		$DBPassword = 'MWAs=(gap]s6B4H',
		$DBName = "7v2m4jsdb",
		$DBCharset = 'utf8';
	private 
		$link,
		$tableName;

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

	function setTableName()
	{

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

			return \false;
		}
		return \true;
	}

	function tableDrop($nameTable)
	{
		$this->link->query('DROP TABLE ' . $nameTable . ';');
	}

	function getTableDada($tableName)
	{
		// получить имена столбцов
		$query = $this->link->prepare("select * from $tableName");
		$query->execute();
		for ($i = 0; $i < $query->columnCount(); $i++) {
			$col = $query->getColumnMeta($i);
			$columns[] = $col['name'];
		}
		$table_str = $query->fetchAll();
		return array("columns"=>$columns, "table_str" =>$table_str);
	}

	function addEntry($tableName, $arrValues)
	{
		$placeholder =implode(",",array_fill(0,count($arrValues),"?"));
		$placeholderValue = array_column($arrValues, \null);
		$query = $this->link->prepare("INSERT INTO $tableName VALUES( $placeholder )");
		$query->execute($placeholderValue);
	}

	function deleteEntry($tableName, $id)
	{
		$query = $this->link->prepare("DELETE FROM $tableName WHERE id = ? ");
		$query->execute(array($id));
	}


	function editEntry($tableName, $arrElemRow)
	{
		$id = $arrElemRow["id"];
		unset($arrElemRow["id"]);
		$newValue = array();
		foreach($arrElemRow as $key => $value)
		{
			$newValue[] = "$key = :$key";
		}
		$newValue = implode(",", $newValue);
		$query = $this->link->prepare("UPDATE $tableName SET $newValue WHERE id=$id");
		return $query->execute($arrElemRow);
	}
}
