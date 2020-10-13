<?
namespace Controllers;

use System\View;

/**
 * Главный контроллер приложения
 */
class Controller
{
	public $dirViwe="",
			$templateViwe = "main";
	protected $view;

	function __construct($nameController)
	{
		$this->view = new View;
		$this->addSettings($nameController);
	}

	protected function addSettings($nameController)
	{
		$this->view->vData["title"] = "Решение задач для собеседований";
		$this->dirViwe = $nameController."/";
	}

	/**
	 * Действие отвечающее за отображение главной
	 * страницы 
	 *
	 */
	public function actionIndex()
	{
		// Рендер главной страницы 
		$this->view->render($this->templateViwe, $this->dirViwe.'index');
	}
}