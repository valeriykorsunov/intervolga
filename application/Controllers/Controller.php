<?
namespace Controllers;

use System\View;

/**
 * Главный контроллер приложения
 *
 */
class Controller
{
	public $dirViwe="";
	public $templateViwe = "main";

	function __construct($nameController)
	{
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
		View::render($this->templateViwe, $this->dirViwe.'index');
	}
}