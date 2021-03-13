<?
namespace Controllers;

use System\View;
use System\App;

use Models\Session;

abstract class Controller
{
	public  $dirViwe="",
			$view;
	protected $groupsWithAccess = array(0);

	function __construct($nameController)
	{
		$this->view = new View;
		$this->view->setTemplateViwe("main");
		$this->view->vData["title"] = "Решение задач для собеседований";
		$this->dirViwe = $nameController."/";
	}

	protected function addUsersGroup(int $usersGroup)
	{
		$this->usersGroup[] = $usersGroup;
	}

	protected function setUsersGroup(array $usersGroup)
	{
		$this->groupsWithAccess = $usersGroup;
	}

	public function actionIndex()
	{
		$this->view->render($this->dirViwe.'index');
	}

	public function getGroupsWithAccess()
	{
		return $this->groupsWithAccess;
	}

	function onlyForGroups(array $groups)
	{
		if(!Session::checkAccess($groups))
		{
			App::accessDenied();
			die;
		}
	}
}