<?
namespace Controllers;

use System\View;

/**
 * Главный контроллер приложения
 */
class Controller
{
	public $dirViwe="";
	public $templateViwe = "main";
	public $viewData = array();

	function __construct($nameController)
	{
		$this->addSettings($nameController);
	}

	protected function addSettings($nameController)
	{
		$this->viewData["title"] = "Решение задач для собеседований";
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
		View::render($this->templateViwe, $this->dirViwe.'index', $this->viewData);
	}
}