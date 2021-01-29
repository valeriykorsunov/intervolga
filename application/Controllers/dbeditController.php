<?

namespace Controllers;

use Models\DB;


class dbeditController extends Controller
{
	public $groupsWithAccess = array(1);

	function __construct($nameController)
	{
		parent::__construct($nameController);

		$this->view->vData["menuSection"] = array(
			array(
				"SORT"=>100,
				"NAME"=>"Добавить таблицу",
				"URL"=>"/dbedit/addTable/"
			),
			array(
				"SORT"=>100,
				"NAME"=>"Список таблиц БД",
				"URL"=>"/dbedit/tables/"
			),
			array(
				"SORT"=>100,
				"NAME"=>"SQL запрос текстом",
				"URL"=>"/dbedit/textSql/"
			),
		);
	}

	function actionTextSql()
	{
		if ($_POST['btn'])
		{
			$db = new DB;
			$resSqlQuery = $db->textSqlQuery($_POST["sqlQuery"]);
		}
		$this->vData["resSqlQuery"] = $resSqlQuery;

		$this->view->render($this->dirViwe . 'textSql');
	}

	function actionTables()
	{
		$db = new DB;
		
		if($_GET['tableDrop'])
		{
			$db->tableDrop($_GET['tableDrop']);
		}
		
		$this->view->vData["allTable"] = $db->getAllTable();

		$this->view->render($this->dirViwe . 'tables');
	}
	
	function actionEditTable()
	{
		$this->view->arJsFile[] = "/js/dbedit.js";

		$db = new DB;

		if($_POST["ajax"] == "Y")
		{
			ob_start(null, 0, PHP_OUTPUT_HANDLER_CLEANABLE);
			ob_clean();
			if($_POST["delete"] == "Y")
			{
				$db->deleteEntry($_GET["table"], $_POST["idRow"]);
			}

			if($_POST["editRow"] == "Y")
			{
				$param = json_decode($_POST["arrElemRow"], true);
				if($db->editEntry($_GET["table"], $param))
				{
					echo "Y";
				}
			}
			
			die();
		}

		if($_POST["addEntry"])
		{
			$db->addEntry($_GET["table"], $_POST["column"]);
		}

		if($_GET["table"])
		{
			$this->view->vData["Table"] = $db->getTableDada($_GET["table"]);
		}

		// все операции делать пост запросами. 
		$this->view->render($this->dirViwe . 'editTable');
	}

	function actionAddTable()
	{
		$this->view->arJsFile[] = "/js/dbedit.js";

		if($_POST["btn"] == "Создать")
		{

			$tableName = $_POST["tableName"];
			$arColName = $_POST["name"];
			$arColTypeDate = $_POST["typeDate"]; 
			$arColAttribute = $_POST["attribute"];
			
			// создать таблицу
			$db = new DB;
			$result = $db->createTable($tableName, $arColName, $arColTypeDate, $arColAttribute);

			if($result === true){
				$this->view->vData["message"] = 'Таблица создана. <a href="/dbedit/tables/">Смотреть список таблиц.</a>';
			}
			else
			{
				$this->view->vData["error"] = $result[0]['error'];
			}
		}
		
		$this->view->render($this->dirViwe . 'addTable');
	}
}
