<?

namespace Controllers;

use Models\Session;
use Models\User;

class userController extends Controller
{
	function __construct($nameController)
	{
		parent::__construct($nameController);

		if (USER["ADMIN"] === true)
		{
			$this->view->vData["menuSection"] = array(
				array(
					"SORT" => 100,
					"NAME" => "Изменить данные пользователя",
					"URL" => "/user/edituser/"
				),
				array(
					"SORT" => 100,
					"NAME" => "Добавить Пользователя",
					"URL" => "/user/addUser/"
				),
			);
		}
	}

	function actionLogout()
	{
		session_start();
		session_destroy();
		header('Location:/');
	}

	function actionLogin()
	{
		$this->view->vData["title"] = "Авторизация";

		if (USER["AUTHORIZED"] === true)
		{
			$this->view->vData["login_status"] = "access_granted";
		}
		elseif (isset($_POST['login']) || isset($_POST['password']))
		{
			$this->view->vData["login_status"] = "access_denied";
		}

		$this->view->render($this->dirViwe . 'login');
	}

	function actionIndex()
	{
		$this->view->render($this->dirViwe . 'index');
	}

	function actionlist()
	{
		$user = new User;
		$this->view->vData["userList"] =  $user->getUserList();
		$this->view->render($this->dirViwe . 'list');
	}

	function actionAddUser()
	{
		// $user = new User;
		// $this->view->vData["userList"] =  $user ->getUserList(); 
		$this->view->render($this->dirViwe . 'addUser');
	}

	function actionEditUser()
	{
		$this->onlyForGroups(array(777));// только для администратора

		$user = new User;

		if ($_POST["btn"])
		{
			$user->editRecord(
				$_POST["ID"],
				array(
					"login" => $_POST["login"],
					"name" => $_POST["name"],
					"usgroup" => $_POST["usgroup"]
				)
			);
		}
		
		if ($_GET["user"])
		{
			$arrayUser = $user->getUserByID($_GET["user"]);
			$this->view->vData["userList"] =  $arrayUser;
		}
		
		if ($_POST["btn_pass"])
		{
			$this->view->vData["userList"]["editPass"] = $user->editPass($_POST["ID"], $_POST["pass1"], $_POST["pass2"]);
		}

		$this->view->render($this->dirViwe . 'editUser');
	}
}
