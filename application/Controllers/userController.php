<?
namespace Controllers;

use Models\User;

Class userController extends Controller
{
	function actionLogout()
	{
		session_start();
		session_destroy();
		header('Location:/');
	}

	function actionLogin()
	{
		$this->view->vData["title"] = "Авторизация";

		if(USER["AUTHORIZED"] === true)
		{
			$this->view->vData["login_status"] = "access_granted";
		}
		elseif(isset($_POST['login']) || isset($_POST['password']))
		{
			$this->view->vData["login_status"] = "access_denied";
		}
		

		$this->view->render($this->dirViwe.'login');
	}

	function actionIndex()
	{

		$this->view->render($this->dirViwe.'index');
	}
}