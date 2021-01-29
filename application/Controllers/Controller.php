<?
namespace Controllers;

use System\View;
use Models\User;

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

	public function actionIndex()
	{
		$this->view->render($this->dirViwe.'index');
	}

	public function getGroupsWithAccess()
	{
		return $this->groupsWithAccess;
	}
}