<?

namespace Controllers;

use Models\DB;
use System\View;

class dbeditController extends Controller
{
	public $menuSection;

	function __construct($nameController)
	{
		$this->addSettings($nameController);
		$this->viewData["menuSection"] = array(
			array(
				"SORT"=>100,
				"NAME"=>"Список таблиц БД",
				"URL"=>"/dbedit/tables/"
			),
			array(
				"SORT"=>100,
				"NAME"=>"SQL запрос текстом",
				"URL"=>"/dbedit/textSql/"
			)
		);
	}

	public function actionIndex()
	{
		View::render($this->templateViwe, $this->dirViwe . 'index', $this->viewData);
	}

	function actionTextSql()
	{
		if ($_POST['btn'])
		{
			$db = new DB;
			$resSqlQuery = $db->textSqlQuery($_POST["sqlQuery"]);
		}
		$this->viewData["resSqlQuery"] = $resSqlQuery;

		View::render($this->templateViwe, $this->dirViwe . 'textSql', $this->viewData);
	}

	function actionTables()
	{
		$db = new DB;
		$this->viewData["allTable"] = $db->getAllTable();

		View::render($this->templateViwe, $this->dirViwe . 'tables', $this->viewData);
	}
}
