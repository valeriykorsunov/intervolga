<?
namespace Controllers;

use System\View;

/**
 * Главный контроллер приложения
 *
 */
class Controller
{
	public $nameController;

	function __construct($nameController)
	{
		$this->nameController = $nameController;
	}
	/**
	 * Действие отвечающее за отображение главной
	 * страницы портала
	 *
	 */
	public function actionIndex()
	{
		// Рендер главной страницы портала
		View::render('Index');
	}
}