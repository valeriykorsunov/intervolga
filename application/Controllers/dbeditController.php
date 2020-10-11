<?

namespace Controllers;

use Models\DB;
use System\View;

class dbeditController extends Controller
{
	public function actionIndex()
	{
		$data = array();

		View::render($this->templateViwe, $this->dirViwe . 'index', $data);
	}

	function actionTextSql()
	{
		$data = array();
		if ($_POST['btn'])
		{
			$db = new DB;
			$resSqlQuery = $db->getSqlText($_POST["sqlQuery"]);
		}
		if($resSqlQuery) $data = $resSqlQuery;
		//\var_dump($data);
		View::render($this->templateViwe, $this->dirViwe . 'textSql', $data);
	}
}
