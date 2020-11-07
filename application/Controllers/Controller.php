<?
namespace Controllers;

use System\View;

/**
 * Главный контроллер приложения
 */
abstract class Controller
{
	public  $dirViwe="",
			$view;

	function __construct($nameController)
	{
		$this->view = new View;
		//$this->templateViwe
		$this->view->setTemplateViwe("main");
		$this->view->vData["title"] = "Решение задач для собеседований";
		$this->dirViwe = $nameController."/";
	}

	public function actionIndex()
	{
		$this->view->render($this->dirViwe.'index');
	}
}